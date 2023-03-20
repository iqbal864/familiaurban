<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['admins'] = 'admins/admins';

// kategori properti
$route['admins/kategori_properti'] = 'admins/kategori_properti/kategori_properti';
$route['admins/kategori_properti/edit/edit'] = 'admins/kategori_properti/edit/edit';
$route['admins/kategori_properti/edit/tambah_gambar'] = 'admins/kategori_properti/edit/tambah_gambar';
$route['admins/kategori_properti/edit/hapus_gambar'] = 'admins/kategori_properti/edit/hapus_gambar';
$route['admins/kategori_properti/edit/tambah_gambar_en'] = 'admins/kategori_properti/edit/tambah_gambar_en';
$route['admins/kategori_properti/edit/hapus_gambar_en'] = 'admins/kategori_properti/edit/hapus_gambar_en';
$route['admins/kategori_properti/edit/(:any)'] = 'admins/kategori_properti/edit/index/$1';

// item properti
$route['admins/item_properti'] = 'admins/item_properti/item_properti';
$route['admins/item_properti/edit/edit'] = 'admins/item_properti/edit/edit';
$route['admins/item_properti/file/file'] = 'admins/item_properti/file/file';
$route['admins/item_properti/edit/tambah_gambar'] = 'admins/item_properti/edit/tambah_gambar';
$route['admins/item_properti/edit/hapus_gambar'] = 'admins/item_properti/edit/hapus_gambar';
$route['admins/item_properti/edit/tambah_gambar_en'] = 'admins/item_properti/edit/tambah_gambar_en';
$route['admins/item_properti/edit/hapus_gambar_en'] = 'admins/item_properti/edit/hapus_gambar_en';
$route['admins/item_properti/edit/(:any)'] = 'admins/item_properti/edit/index/$1';
$route['admins/item_properti/file/(:any)'] = 'admins/item_properti/file/index/$1';

// tipe properti
$route['admins/item_properti/tipe_properti/(:any)'] = 'admins/item_properti/tipe_properti/tipe_properti/index/$1';
$route['admins/item_properti/tipe_properti'] = 'admins/item_properti/tipe_properti/tipe_properti/index';
$route['admins/item_properti/tipe_properti/tambah/tambah'] = 'admins/item_properti/tipe_properti/tambah/tambah';
$route['admins/item_properti/tipe_properti/edit/edit'] = 'admins/item_properti/tipe_properti/edit/edit';
$route['admins/item_properti/tipe_properti/spesifikasi/spesifikasi'] = 'admins/item_properti/tipe_properti/spesifikasi/spesifikasi';
$route['admins/item_properti/tipe_properti/(:any)/tambah'] = 'admins/item_properti/tipe_properti/tambah';
$route['admins/item_properti/tipe_properti/(:any)/spesifikasi/(:any)'] = 'admins/item_properti/tipe_properti/spesifikasi';
$route['admins/item_properti/tipe_properti/(:any)/spesifikasi'] = 'admins/item_properti/tipe_properti/spesifikasi';
$route['admins/item_properti/tipe_properti/(:any)/edit/(:any)'] = 'admins/item_properti/tipe_properti/edit';
$route['admins/item_properti/tipe_properti/(:any)/edit'] = 'admins/item_properti/tipe_properti/edit';
$route['admins/item_properti/tipe_properti/edit/edit'] = 'admins/item_properti/tipe_properti/edit/edit';
$route['admins/item_properti/tipe_properti/(:any)/gambar/(:any)'] = 'admins/item_properti/tipe_properti/gambar';

// banner promo
$route['admins/banner'] = 'admins/banner/banner';

// konsep
$route['admins/konsep'] = 'admins/konsep/konsep';
$route['admins/konsep/konsep/konsep'] = 'admins/konsep/konsep/konsep';
$route['admins/konsep/konsep/tambah_gambar'] = 'admins/konsep/konsep/tambah_gambar';
$route['admins/konsep/konsep/hapus_gambar'] = 'admins/konsep/konsep/hapus_gambar';
$route['admins/konsep/konsep/tambah_gambar_en'] = 'admins/konsep/konsep/tambah_gambar_en';
$route['admins/konsep/konsep/hapus_gambar_en'] = 'admins/konsep/konsep/hapus_gambar_en';

// kenapa_kami
$route['admins/kenapa_kami'] = 'admins/kenapa_kami/kenapa_kami';
$route['admins/kenapa_kami/kenapa_kami/kenapa_kami'] = 'admins/kenapa_kami/kenapa_kami/kenapa_kami';

// banner promo
$route['admins/alamat'] = 'admins/alamat/alamat';
$route['admins/alamat/alamat/alamat'] = 'admins/alamat/alamat/alamat';

// fasilitas
$route['admins/fasilitas'] = 'admins/fasilitas/fasilitas';
$route['admins/fasilitas/fasilitas/fasilitas'] = 'admins/fasilitas/fasilitas/fasilitas';

// Kerja sama
$route['admins/kerja_sama'] = 'admins/kerja_sama/kerja_sama';
$route['admins/kerja_sama/kerja_sama/kerja_sama'] = 'admins/kerja_sama/kerja_sama/kerja_sama';

// Sosial Media
$route['admins/sosial_media'] = 'admins/sosial_media/sosial_media';
$route['admins/sosial_media/sosial_media/sosial_media'] = 'admins/sosial_media/sosial_media/sosial_media';

// Testimoni
$route['admins/testimoni'] = 'admins/testimoni/testimoni';
$route['admins/testimoni/testimoni/testimoni'] = 'admins/testimoni/testimoni/testimoni';

// Kontak
$route['admins/kontak'] = 'admins/kontak/kontak';
$route['admins/kontak/kontak/kontak'] = 'admins/kontak/kontak/kontak';

// Pengaturan
$route['admins/pengaturan'] = 'admins/pengaturan/pengaturan';
$route['admins/pengaturan/pengaturan/pengaturan'] = 'admins/pengaturan/pengaturan/pengaturan';

// pengguna
$route['admins/pengguna'] = 'admins/pengguna/pengguna';
$route['admins/pengguna/edit/edit'] = 'admins/pengguna/edit/edit';
$route['admins/pengguna/edit/(:any)'] = 'admins/pengguna/edit/index/$1';

$route['home/download/(:any)'] = 'home/download/$1';

$route['properti/loadMoreData'] = 'properti/loadMoreData';
$route['properti/(:any)'] = 'properti/index/$1';
$route['properti/(:any)/(:any)'] = 'detail_properti/index/$1';

$route['galeri/loadMoreGambar'] = 'galeri/loadMoreGambar';
$route['galeri/loadMoreVidio'] = 'galeri/loadMoreVidio';
$route['galeri/(:any)'] = 'galeri/index/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
