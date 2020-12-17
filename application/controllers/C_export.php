<?php

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_export extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporan', 'laporan');
        $this->load->model('M_akun_pembukuan', 'akun');
        $this->load->model('M_transaksi', 'transaksi');
    }

    //EXPORT EXCEL JURNAL UMUM
    public function export_jurnal_umum()
    {
        $semua_jurnal_umum = $this->laporan->get_jurnal_umum()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Tanggal Transaksi')
                    ->setCellValue('C1', 'Keterangan')
                    ->setCellValue('D1', 'Nama Akun')
                    ->setCellValue('E1', 'Ref')
                    ->setCellValue('F1', 'Debit')
                    ->setCellValue('G1', 'Kredit');

        $kolom = 2;
        $nomor = 1;
        foreach($semua_jurnal_umum as $jurnal) {

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, date('d-m-Y', strtotime($jurnal->tanggal_transaksi)) )
                        ->setCellValue('C' . $kolom, $jurnal->keterangan)
                        ->setCellValue('D' . $kolom, $jurnal->nama_akun)
                        ->setCellValue('E' . $kolom, $jurnal->ref)
                        ->setCellValue('F' . $kolom, "=IF($jurnal->debit_kredit=1, $jurnal->nilai, 0)" )
                        ->setCellValue('G' . $kolom, "=IF($jurnal->debit_kredit=2, $jurnal->nilai, 0)" );

            $kolom++;
            $nomor++;

        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Bulan Ini.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    
    }

    //EXPORT EXCEL BUKU BESAR
    public function export_buku_besar($id_akun)
    {
        $satu_buku_besar = $this->laporan->get_buku_besar($id_akun)->result();
        $saldo_awal_bulan = $this->laporan->get_saldo_awal_perbulan($id_akun)->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Tanggal Transaksi')
                    ->setCellValue('C1', 'Keterangan')
                    ->setCellValue('D1', 'Debit')
                    ->setCellValue('E1', 'Kredit')
                    ->setCellValue('F1', 'Saldo');

        $kolom = 2;
        $nomor = 1;
        foreach($saldo_awal_bulan as $saldo_awal) {
            $saldoAwalBulan = $saldo_awal->debitTotal - $saldo_awal->kreditTotal;

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, date('01-m-Y') )
                        ->setCellValue('C' . $kolom, 'Saldo Awal Bulan')
                        ->setCellValue('D' . $kolom, "=IF($saldoAwalBulan >= 0, $saldoAwalBulan, 0)" )
                        ->setCellValue('E' . $kolom, "=IF($saldoAwalBulan < 0, $saldoAwalBulan, 0)" )
                        ->setCellValue('F' . $kolom, $saldoAwalBulan);

        }

        $kolom = 3;
        $nomor = 2;
        $debit = 0;
        $kredit = 0;
        foreach($satu_buku_besar as $buku_besar) {

            if($buku_besar->debit_kredit == "1" ){
                $debit = $debit + $buku_besar->nilai;
            }else{
                $kredit = $kredit + $buku_besar->nilai;
            }
            $hasil = $saldoAwalBulan+$debit-$kredit;
            $hasil = abs($hasil);
            $buku_besar->nilai = abs($buku_besar->nilai);

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, date('d-m-Y', strtotime($buku_besar->tanggal_transaksi)) )
                        ->setCellValue('C' . $kolom, $buku_besar->keterangan)
                        ->setCellValue('D' . $kolom, "=IF($buku_besar->debit_kredit=1, $buku_besar->nilai, 0)" )
                        ->setCellValue('E' . $kolom, "=IF($buku_besar->debit_kredit=2, $buku_besar->nilai, 0)" )
                        ->setCellValue('F' . $kolom, "=IF($hasil >= 0, $hasil, $hasil )" );

            $kolom++;
            $nomor++;

        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Buku Besar Bulan Ini.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    
    }
}