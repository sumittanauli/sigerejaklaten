create database sistem_gereja;
use sistem_gereja;

create table jemaat(
					   nik varchar(16) not null primary key,
					   nomor_keluarga varchar(50) not null,
					   nama_jemaat varchar(200) not null,
					   tempat_lahir_jemaat varchar(200) not null,
					   tanggal_lahir_jemaat date not null,
					   jenis_kelamin_jemaat enum('Laki-Laki','Perempuan') not null,
					   alamat_jemaat varchar(200) not null,
					   pekerjaan_jemaat varchar(50),
					   status_jemaat enum('Belum Menikah','Sudah Menikah','Janda','Duda') not null,
					   foto varchar(100)
)

create table baptis(
	nik varchar(16) not null primary key,
	nomor_surat_baptis varchar (50) not null,
	id_pendeta int not null,
	tempat_baptis varchar (100) not null,
	tanggal_baptis date not null,
	foto varchar(100)
)

create table nikah(
	nik varchar(16) not null primary key,
	nomor_surat_nikah varchar(30) not null,
	nik_suami varchar(16) not null,
	nik_istri varchar(16) not null,
	nama_pendeta_nikah varchar(50) not null,
	tempat_nikah varchar(50) not null,
	tanggal_nikah date not null,
	tanggal_cerai date,
	foto varchar(100)
)

create table pengurus(
	nik varchar(16) not null primary key,
	nomor_surat_pengurus varchar(50) not null,
	asal_pengurus varchar(150) not null,
	pendidikan_pengurus enum('Tidak Sekolah','SD', 'SMP', 'SLTA', 'SLTU', 'D1', 'D2', 'D3', 'S1', 'S2', 'Dll') not null,
	tanggal_mulai_pengurus date not null,
	tanggal_selesai_pengurus date not null,
	status_pengurus enum('Tidak Aktif','Aktif') not null,
	foto varchar(100)
)

create table pendeta(
	id_pendeta int not null primary key,
	nomor_surat_pendeta varchar(30) not null,
	nama_pendeta varchar(200) not null,
	asal_pendeta varchar(150) not null,
	pendidikan_pendeta enum('Tidak Sekolah','SD', 'SMP', 'SLTA', 'SLTU', 'D1', 'D2', 'D3', 'S1', 'S2', 'Dll') not null,
	tahun_mulai_pendeta date not null,
	tahun_selesai_pendeta date not null,
	periode_pendeta varchar (60) not null,
	status_pendeta enum('Tidak Aktif','Aktif') not null,
	foto varchar(100)
)

create table pindahjemaat(
    nik varchar(16) not null primary key auto_increment,
    nomor_surat_pindahjemaat varchar(16) not null,
    asal_gereja varchar(100) not null,
    tujuan_gereja varchar(100) not null,
    tahun_masuk date not null,
    tahun_keluar date not null
)

create table cerai(
	nomor_surat_cerai varchar(16) not null primary key,
	nik_suami varchar(16) not null,
	nik_istri varchar(16) not null,
	tanggal_cerai date not null,
	tempat_cerai varchar(200) not null,
	alasan_cerai enum('Cerai Hidup','Cerai Mati', 'Dll') not null,
	foto varchar(100)
)

create table mati(
	nik varchar(16) not null primary key,
	nomor_surat_mati varchar(16) not null,
	tanggal_mati date not null,
	tempat_mati varchar(200) not null,
	alasan_mati enum('Faktor Umur','Penyakit', 'Kecelakaan', 'Dll') not null
)

create table user_access_menu(
    id int not null primary key auto_increment,
    role_id int not null,
    menu_id int not null
)

create table user(
    id int not null primary key auto_increment,
    name varchar(200) not null,
    email varchar(200) not null,
    image varchar(200) not null,
    password varchar(200) not null,
    role_id int not null,
    is_active int not null,
    date_created int not null
)

create table user_menu(
    id int not null primary key auto_increment,
    menu varchar(200) not null
)

create table user_role(
    id int not null primary key auto_increment,
    role varchar(200) not null
)

create table user_sub_menu(
	id int not null primary key auto_increment,
	menu_id int not null,
	title varchar(200) not null,
	url varchar(200) not null,
	icon varchar(200) not null,
	is_active int not null
)
