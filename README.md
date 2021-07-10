# fp_mbd tes

## no 1
### Active database
#### function
function yang kita buat adalah untuk mendapatkan total harga suatu pemesanan 

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

### sequence
menambah data kategori id secara otomatis

### trigger
berhubungan dengan sequence yang telah kita buat tetapi kategori id akan terbuat setelah tiap pemasukan data
