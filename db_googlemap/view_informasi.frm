TYPE=VIEW
query=select `info`.`id_info` AS `id_info`,`db_googlemap`.`tbl_provinsi`.`nama_prov` AS `nama_prov`,`db_googlemap`.`tbl_bencana`.`nama_bencana` AS `nama_bencana`,`info`.`tgl` AS `tgl`,`info`.`waktu` AS `waktu`,`info`.`lokasi` AS `lokasi`,`info`.`korban` AS `korban`,`info`.`penyebab` AS `penyebab`,`info`.`kerusakan` AS `kerusakan`,`info`.`penanganan` AS `penanganan`,`info`.`foto` AS `foto`,`info`.`jenis` AS `jenis`,`info`.`lat` AS `lat`,`info`.`lng` AS `lng` from ((`db_googlemap`.`tbl_informasi` `info` join `db_googlemap`.`tbl_bencana`) join `db_googlemap`.`tbl_provinsi`) where ((`info`.`id_prov` = `db_googlemap`.`tbl_provinsi`.`id_prov`) and (`info`.`id_bencana` = `db_googlemap`.`tbl_bencana`.`id_bencana`))
md5=e152c19c3517c113d3ce8729361fccb9
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2012-10-03 04:22:46
create-version=1
source=select `id_info` AS `id_info`,`tbl_provinsi`.`nama_prov` AS `nama_prov`,`tbl_bencana`.`nama_bencana` AS `nama_bencana`,`info`.`tgl` AS `tgl`,`info`.`waktu` AS `waktu`,`info`.`lokasi` AS `lokasi`,`info`.`korban` AS `korban`,`info`.`penyebab` AS `penyebab`,`info`.`kerusakan` AS `kerusakan`,`info`.`penanganan` AS `penanganan`,`info`.`foto` AS `foto`,`jenis`,`lat`,`lng` from ((`tbl_informasi` `info` join `tbl_bencana`) join `tbl_provinsi`) where ((`info`.`id_prov` = `tbl_provinsi`.`id_prov`) and (`info`.`id_bencana` = `tbl_bencana`.`id_bencana`))
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `info`.`id_info` AS `id_info`,`db_googlemap`.`tbl_provinsi`.`nama_prov` AS `nama_prov`,`db_googlemap`.`tbl_bencana`.`nama_bencana` AS `nama_bencana`,`info`.`tgl` AS `tgl`,`info`.`waktu` AS `waktu`,`info`.`lokasi` AS `lokasi`,`info`.`korban` AS `korban`,`info`.`penyebab` AS `penyebab`,`info`.`kerusakan` AS `kerusakan`,`info`.`penanganan` AS `penanganan`,`info`.`foto` AS `foto`,`info`.`jenis` AS `jenis`,`info`.`lat` AS `lat`,`info`.`lng` AS `lng` from ((`db_googlemap`.`tbl_informasi` `info` join `db_googlemap`.`tbl_bencana`) join `db_googlemap`.`tbl_provinsi`) where ((`info`.`id_prov` = `db_googlemap`.`tbl_provinsi`.`id_prov`) and (`info`.`id_bencana` = `db_googlemap`.`tbl_bencana`.`id_bencana`))
