# fp_mbd tes

## no 1
### Active database
#### FUNCTION
1. Jika order_id null isikan dengan latest order_id
```sql
CREATE OR REPLACE FUNCTION new_order_details()
    RETURNS TRIGGER
    AS $new_order_details$
	DECLARE last_order_id integer;
BEGIN
	SELECT MAX(order_id) INTO last_order_id FROM orders;
	
    IF NEW.order_id IS NULL THEN
	NEW.order_id := last_order_id;
    END IF;
	RETURN NEW;
END;
$new_order_details$ LANGUAGE plpgsql;
```

2. mendapatkan total harga suatu pemesanan (melalui order_id)
```sql
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

SELECT * FROM total_harga(11077);
```

3. update unit di produk
```sql
CREATE OR REPLACE FUNCTION update_product_units()
    RETURNS TRIGGER
    AS $update_product_units$
BEGIN
    UPDATE products
    SET units_in_stock = units_in_stock - 1, units_on_order = units_on_order + 1
    WHERE product_id = NEW.product_id; 
 RETURN NEW;
END;
$update_product_units$ LANGUAGE plpgsql
```

#### Procedure
1. mengganti shipped_date suatu order menjadi tanggal tertentu
```sql
CREATE OR REPLACE PROCEDURE set_shipped_date(p_order_id integer, p_shipped_date date)
AS $set_shipped_date$
BEGIN
    UPDATE orders
    SET shipped_date = p_shipped_date
    WHERE order_id = p_order_id;
END;
$set_shipped_date$ LANGUAGE plpgsql;

CALL set_shipped_date (11078, '20-01-2001'); 
```

2. reorder produk
```sql
CREATE OR REPLACE PROCEDURE reorder_product(p_product_id integer, p_qty integer)
    AS $reorder_product$
BEGIN
    UPDATE products
    SET units_in_stock = units_in_stock + p_qty, reorder_level = 0
    WHERE product_id = p_product_id;
 
    UPDATE products
    SET reorder_level = reorder_level - 1
    WHERE product_id = p_product_id 
    AND reorder_level > 0;
END;
$reorder_product$ LANGUAGE plpgsql;
```

### sequence
menambah data kategori id secara otomatis

### TRIGGER
1. order_details baru
```sql
CREATE TRIGGER new_order_details
BEFORE INSERT ON order_details
FOR EACH ROW EXECUTE FUNCTION new_order_details();
```

2. update unit
```sql
CREATE TRIGGER update_product_units
AFTER INSERT ON order_details
FOR EACH ROW EXECUTE FUNCTION update_product_units();
```

## no 2
```sql
CREATE INDEX orders_order_id_idx ON orders (order_id);
CREATE INDEX products_reorder_level_idx ON products (reorder_level);
CREATE INDEX products_units_idx ON products (units_in_stock, units_on_order);
CREATE INDEX customers_customer_id_idx ON customers (customer_id);
CREATE INDEX employees_employee_id_idx ON employees (employee_id);
CREATE INDEX suppliers_supplier_id_idx ON suppliers (supplier_id);
CREATE INDEX products_product_id_idx ON products (product_id);
CREATE INDEX order_details_order_id_product_id_idx ON order_details (order_id, product_id);
```
