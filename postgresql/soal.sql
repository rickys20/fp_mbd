DROP FUNCTION IF EXISTS total_harga(integer);
DROP SEQUENCE IF EXISTS od_discount_seq;
DROP TRIGGER IF EXISTS discount_od ON order_details;
DROP FUNCTION IF EXISTS discount_od();
DROP PROCEDURE IF EXISTS set_shipped_date(integer, date);
DROP TRIGGER IF EXISTS update_product_units ON order_details;
DROP FUNCTION IF EXISTS update_product_units();
DROP TRIGGER IF EXISTS check_product ON order_details;
DROP FUNCTION IF EXISTS check_product();
DROP PROCEDURE IF EXISTS reorder_product(integer, integer);
DROP PROCEDURE IF EXISTS reorder_level_product(integer);

--
-- FUNCTION: mendapatkan total harga suatu pemesanan (melalui order_id)
--

CREATE OR REPLACE FUNCTION total_harga(p_order_id INTEGER)    
    RETURNS INTEGER AS $total_harga$
    DECLARE total_price INTEGER;
BEGIN
    SELECT SUM((unit_price * (1 - discount)) * quantity)
    INTO total_price FROM order_details od,orders o
    WHERE od.order_id = o.order_id and
    od.order_id = p_order_id;
    RETURN total_price;
    EXCEPTION
    WHEN NO_DATA_FOUND
    THEN RETURN('order_id is not in the database');
    WHEN OTHERS 
    THEN RETURN('Error in running show_description');
END;
$total_harga$ LANGUAGE plpgsql;

--
-- TRIGGER/SEQUENCE: Setiap order_details kelipatan 30 atau lebih dari 50% discount menjadi 50%
--

CREATE SEQUENCE od_discount_seq
    AS integer
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 30
    START WITH 0;
 
CREATE OR REPLACE FUNCTION discount_od()
    RETURNS TRIGGER
    AS $discount_od$
BEGIN
    IF od_discount_seq.NEXTVAL = 30 OR NEW.discount > 0.5 THEN
    NEW.discount = 0.5;
    END IF;
END;
$discount_od$ LANGUAGE plpgsql;

CREATE TRIGGER discount_od
BEFORE INSERT OR UPDATE ON order_details
FOR EACH ROW EXECUTE FUNCTION discount_od();

--
-- TRIGGER/FUNCTION: mengupdate units_in_stock dan units_in_order
--

CREATE OR REPLACE FUNCTION update_product_units()
    RETURNS TRIGGER
    AS $update_product_units$
    DECLARE
BEGIN
    UPDATE products
    SET units_in_stock = units_in_stock - 1
    AND units_in_order = units_in_order + 1
    WHERE product_id = NEW.product_id; 
END;
$update_product_units$ LANGUAGE plpgsql;

CREATE TRIGGER update_product_units
AFTER INSERT ON order_details
FOR EACH ROW EXECUTE FUNCTION update_product_units();

--
-- TRIGGER/FUNCTION: menghapus order_details saat insert jika product discontinued atau units_in_stock = 0
--

CREATE OR REPLACE FUNCTION check_product()
    RETURNS TRIGGER
    AS $check_product$
    DECLARE discontinued integer;
    DECLARE units_in_stock integer;
BEGIN
    SELECT p.discontinued INTO discontinued
    FROM order_details AS od JOIN products AS p ON od.product_id = p.product_id
    WHERE od.order_id = NEW.order_id;
 
    SELECT p.units_in_stock INTO units_in_stock
    FROM order_details AS od JOIN products AS p ON od.product_id = p.product_id
    WHERE od.order_id = NEW.order_id;
 
    IF discontinued = 1 OR units_in_stock <= 0 THEN
    DELETE FROM order_details 
    WHERE order_id = NEW.order_id
    AND product_id = NEW.product_id;
    END IF;
 
    IF units_in_stock <= 0 THEN
    CALL reorder_level_product(NEW.product_id);
    END IF;
END;$check_product$ LANGUAGE plpgsql;

CREATE TRIGGER check_product
AFTER INSERT ON order_details
FOR EACH ROW 
EXECUTE PROCEDURE check_product();

--
-- PROCEDURE: mengganti shipped_date suatu order menjadi tanggal tertentu
--

CREATE OR REPLACE PROCEDURE set_shipped_date(p_order_id integer, p_shipped_date date)
AS $set_shipped_date$
BEGIN
    UPDATE orders
    SET shipped_date = p_shipped_date
    WHERE order_id = p_order_id;
END;
$set_shipped_date$ LANGUAGE plpgsql;

--
-- PROCEDURE: melakukan reorder products
--

CREATE OR REPLACE PROCEDURE reorder_product(p_product_id integer, p_qty integer)
    AS $reorder_product$
BEGIN
    UPDATE products
    SET units_in_stock = qty AND reorder_level = 0
    WHERE product_id = p_product_id;
 
    UPDATE products
    SET reorder_level = reorder_level - 1
    WHERE product_id = p_product_id 
    AND reorder_level > 0;
END;
$reorder_product$ LANGUAGE plpgsql;

--
-- PROCEDURE: mengisikan reorder_level pada product
--

CREATE OR REPLACE PROCEDURE reorder_level_product(p_product_id integer)
    AS $reorder_level_product$
    DECLARE max_reorder_level integer;
BEGIN
    SELECT MAX(reorder_level) FROM products
    INTO max_reorder_level
    GROUP BY product_id;

    UPDATE products
    SET reorder_level = max_reorder_level + 1
    WHERE product_id = p_product_id;
END;
$reorder_level_product$ LANGUAGE plpgsql;

DROP INDEX IF EXISTS orders_order_id_idx;
DROP INDEX IF EXISTS customers_customer_id_idx;
DROP INDEX IF EXISTS employees_employee_id_idx;
DROP INDEX IF EXISTS suppliers_supplier_id_idx;
DROP INDEX IF EXISTS products_product_id_idx;
DROP INDEX IF EXISTS order_details_order_id_product_id_idx;
DROP INDEX IF EXISTS products_reorder_level_idx;
DROP INDEX IF EXISTS products_units_idx;

CREATE INDEX orders_order_id_idx ON orders (order_id);
CREATE INDEX products_reorder_level_idx ON products (reorder_level);
CREATE INDEX products_units_idx ON products (units_in_stock, units_on_order);
CREATE INDEX customers_customer_id_idx ON customers (customer_id);
CREATE INDEX employees_employee_id_idx ON employees (employee_id);
CREATE INDEX suppliers_supplier_id_idx ON suppliers (supplier_id);
CREATE INDEX products_product_id_idx ON products (product_id);
CREATE INDEX order_details_order_id_product_id_idx ON order_details (order_id, product_id);




-- Ricky ---
-- Sequence categories
CREATE SEQUENCE new_categories
 AS integer
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999;

CREATE OR REPLACE FUNCTION add_new_categories()    
   RETURNS TRIGGER
   AS $add_new_categories$
BEGIN
   IF NEW.category_id IS NULL
   THEN PERFORM setval('new_categories', (SELECT MAX(category_id) FROM categories));
   NEW.category_id := NEXTVAL('new_categories');      
   END IF; 
   RETURN NEW;
END;
$add_new_categories$ LANGUAGE plpgsql;

CREATE TRIGGER add_new_categories BEFORE INSERT ON categories    
   FOR EACH ROW EXECUTE PROCEDURE add_new_categories();

select * from categories order by category_id

--- Sequence new_us_states
CREATE SEQUENCE new_us_states
 AS integer
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999;

CREATE OR REPLACE FUNCTION add_new_us_states()    
   RETURNS TRIGGER
   AS $add_new_us_states$
BEGIN
   IF NEW.state_id IS NULL
   THEN PERFORM setval('new_us_states', (SELECT MAX(state_id) FROM us_states));
   NEW.state_id := NEXTVAL('new_us_states');      
   END IF; 
   RETURN NEW;
END;
$add_new_us_states$ LANGUAGE plpgsql;

CREATE TRIGGER add_new_us_states BEFORE INSERT ON us_states    
   FOR EACH ROW EXECUTE PROCEDURE add_new_us_states();