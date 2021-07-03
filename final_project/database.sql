DROP FUNCTION IF EXISTS total_harga(integer);
DROP SEQUENCE IF EXISTS od_discount_seq;
DROP TRIGGER IF EXISTS discount_od ON order_details;
DROP FUNCTION IF EXISTS discount_od();
DROP PROCEDURE IF EXISTS set_shipped_date(integer, date);

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
-- PROCEDURE: mengganti shipped_date suatu order menjadi tanggal tertentu
--

CREATE OR REPLACE PROCEDURE set_shipped_date(p_order_id integer, p_shipped_date date)
	LANGUAGE plpgsql AS $$
BEGIN
	UPDATE orders
	SET shipped_date = p_shipped_date
	WHERE order_id = p_order_id;
END;$$

-- Sequence categories
CREATE SEQUENCE new_categories
	AS integer
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 999999
	START WITH 1;

CREATE OR REPLACE FUNCTION add_new_categories()    
   RETURNS TRIGGER
   AS $add_new_categories$
BEGIN    
   IF NEW.category_id IS NULL        
   THEN NEW.category_id := NEXTVAL('new_categories');      
   END IF;	
   RETURN NEW;
END;
$add_new_categories$ LANGUAGE plpgsql;

CREATE TRIGGER add_new_categories BEFORE INSERT ON categories    
   FOR EACH ROW EXECUTE PROCEDURE add_new_categories();

INSERT INTO categories(category_name, description, picture) VALUES ('Beverages', 'Soft drinks, coffees, teas, beers, and ales', '\x');
INSERT INTO categories(category_name, description, picture) VALUES ('Condiments', 'Sweet and savory sauces, relishes, spreads, and seasonings', '\x');
INSERT INTO categories(category_name, description, picture) VALUES ('Confections', 'Desserts, candies, and sweet breads', '\x');
INSERT INTO categories(category_name, description, picture) VALUES ('Dairy Products', 'Cheeses', '\x');
INSERT INTO categories(category_name, description, picture) VALUES ('Grains/Cereals', 'Breads, crackers, pasta, and cereal', '\x');
INSERT INTO categories(category_name, description, picture) VALUES ('Meat/Poultry', 'Prepared meats', '\x');
INSERT INTO categories(category_name, description, picture) VALUES ('Produce', 'Dried fruit and bean curd', '\x');
INSERT INTO categories(category_name, description, picture) VALUES ('Seafood', 'Seaweed and fish', '\x');
