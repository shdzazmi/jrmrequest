<?php
// DB table to use
$table = 'stock';

// Table's primary key
$primaryKey = 'id';

//    Data server
$server = '192.168.1.172';
$database = 'JRM';
$username = 'sa';
$password = 'acuan';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'Nama', 'dt' => 0 ),
    array( 'db' => 'BarcodeAktif',  'dt' => 1 ),
    array( 'db' => 'KodeSupp',   'dt' => 2 ),
    array( 'db' => 'Ukuran',     'dt' => 3 ),
    array( 'db' => 'PartNo1',     'dt' => 4 ),
    array( 'db' => 'Lokasi1',     'dt' => 5 ),
    array(
        'db'        => 'HJual',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            return '$'.number_format($d);
        }
    )
);

// SQL server connection information
$sql_details = array(
    'user' => 'sa',
    'pass' => 'acuan',
    'db'   => 'JRM',
    'host' => '192.168.1.172'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
