<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConvertExcelToCsv extends Command
{
    protected $signature = 'convert:xlsx-to-csv {input} {output}';
    protected $description = 'Convert Excel file to CSV format';

    public function handle()
    {
        $input = $this->argument('input');
        $output = $this->argument('output');

        if (!file_exists($input)) {
            $this->error("File tidak ditemukan: $input");
            return 1;
        }

        try {
            // Load Excel menggunakan SimpleXML (untuk XLSX)
            $zip = new \ZipArchive();
            
            // Jika ZipArchive tidak available, gunakan streaming alternative
            if (!extension_loaded('zip')) {
                $this->convertUsingPhpExcel($input, $output);
                return 0;
            }

            if ($zip->open($input) !== true) {
                throw new \Exception('Tidak dapat membuka file Excel');
            }

            $xml = $zip->getFromName('xl/worksheets/sheet1.xml');
            $zip->close();

            if (!$xml) {
                throw new \Exception('Tidak dapat membaca sheet dari Excel');
            }

            // Parse XML
            $rows = $this->parseExcelXml($xml);

            // Write CSV
            $this->writeCsv($output, $rows);

            $this->info("✅ Konversi berhasil!");
            $this->info("📁 Output: $output");
            $this->info("📊 Total baris: " . count($rows));

            return 0;
        } catch (\Exception $e) {
            $this->error("❌ Error: " . $e->getMessage());
            return 1;
        }
    }

    private function parseExcelXml($xmlData)
    {
        $rows = [];
        try {
            $xml = simplexml_load_string($xmlData);
            $rowNum = 0;

            foreach ($xml->sheetData->row as $xmlRow) {
                $rowNum++;
                $row = [];

                foreach ($xmlRow->c as $cell) {
                    $value = '';
                    if (isset($cell->v)) {
                        $value = (string)$cell->v;
                    }
                    $row[] = $value;
                }

                $rows[] = $row;
            }
        } catch (\Exception $e) {
            throw new \Exception('Error parsing Excel XML: ' . $e->getMessage());
        }

        return $rows;
    }

    private function writeCsv($filename, $rows)
    {
        $fp = fopen($filename, 'w');
        if (!$fp) {
            throw new \Exception("Tidak dapat membuat file: $filename");
        }

        foreach ($rows as $row) {
            fputcsv($fp, $row, ';');
        }

        fclose($fp);
    }

    private function convertUsingPhpExcel($input, $output)
    {
        throw new \Exception('ZipArchive tidak tersedia. Gunakan format CSV atau install ext-zip.');
    }
}
