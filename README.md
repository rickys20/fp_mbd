# fp_mbd tes

## no 1
### Active database
#### function
function yang kita buat adalah untuk mendapatkan total harga suatu pemesanan 

#### procedure
mengganti shipped_date suatu order menjadi tanggal tertentu
```CREATE OR REPLACE PROCEDURE set_shipped_date(p_order_id integer, p_shipped_date date)
AS $set_shipped_date$
BEGIN
    UPDATE orders
    SET shipped_date = p_shipped_date
    WHERE order_id = p_order_id;
END;
$set_shipped_date$ LANGUAGE plpgsql;

CALL set_shipped_date (11078, '20-01-2001'); 
```

### sequence
menambah data kategori id secara otomatis

### trigger
berhubungan dengan sequence yang telah kita buat tetapi kategori id akan terbuat setelah tiap pemasukan data
