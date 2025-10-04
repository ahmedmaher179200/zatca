<?php

namespace App\Http\Controllers;
use Mohammad\Zatca\ZATCA\EGS;

use DOMDocument;
use Exception;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;

const ROOT_PATH=__DIR__ ;

class ZatController extends Controller
{
    
    public function index()
    { 
        for ($i = 1; $i <= 3; $i++) {
            $line_item = [
                'id' => (string)$i,
                'name' => 'TEST NAME ' . $i,
                'quantity' => 10,
                'tax_exclusive_price' => 10,
                'VAT_percent' => 0.15,
                'other_taxes' => [],
                'discounts' => [],
            ];
            
            $line_items[] = $line_item; // Add the line item to the array
        }
        $egs_unit = [
            'uuid' => '6f4d20e0-6bfe-4a80-9389-7dabe6620f12',
            'custom_id' => 'EGS1-886431145',
            'model' => 'IOS',
            'CRN_number' => '454634645645654',
            'VAT_name' => 'موسسه تسالى',
            'VAT_number' => '301121971500003',
            'location' => [
                'city' => 'الرياض',
                'city_subdivision' => 'West',
                'street' => 'شارع الملك فهد',
                'plot_identification' => '0000',
                'building' => '0000',
                'postal_zone' => '31952',
            ],
            'branch_name' => 'تسالي',
            'branch_industry' => 'Food',
            'cancelation' => [
                'cancelation_type' => 'INVOICE',
                'canceled_invoice_number' => '',
            ],
        ];
        $invoice = [
            'invoice_counter_number' => 2,
            'invoice_serial_number' => 'EGS1-886431145-1',
            'issue_date' => '2022-03-13',
            'issue_time' => '14:40:40',
            'previous_invoice_hash' => 'NWZlY2ViNjZmZmM4NmYzOGQ5NTI3ODZjNmQ2OTZjNzljMmRiYzIzOWRkNGU5MWI0NjcyOWQ3M2EyN2ZiNTdlOQ==', // AdditionalDocumentReference/PIH
            'line_items' => [
            
            ],
        ];
        for ($i = 0; $i < count($line_items); $i++) {
            $invoice['line_items'][] = $line_items[$i];
        }

        $egs = new EGS($egs_unit);


        $egs->production = false;

        // New Keys & CSR for the EGS
        /*list($private_key, $csr) = $egs->generateNewKeysAndCSR('Qr');
        echo $private_key;
        echo */
        list($private_key, $csr) = $egs->generateNewKeysAndCSR('Qr');
        echo 'Private Key:\n\n' . $private_key . "<br>";
        echo 'csr:\n\n' . $csr . "<br>";
        
        // Issue a new compliance cert for the EGS
        list($request_id, $binary_security_token, $secret) = $egs->issueComplianceCertificate('123345', $csr);
        echo 'secret:\n\n' . $secret . "<br>";

        // Sign invoice
        list($signed_invoice_string, $invoice_hash, $qr,$public_key) = $egs->signInvoice($invoice, $egs_unit, $binary_security_token, $private_key);

        $base64_encoded = base64_encode($signed_invoice_string);

        // Output the Base64 encoded string
        //$file_path =base_path().'/tmp/invoice.xml';
        $file_path = storage_path('app/invoices/invoice.xml');

        if (!file_exists($file_path)) {
            if (!is_dir(dirname($file_path))) {
                mkdir(dirname($file_path), 0755, true);
            }
            
            // Create a new file
            file_put_contents($file_path, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL . '<invoices></invoices>');
            echo 'File created:\n\n' . $file_path . "<br>";
        } else {
        }
        // Save the XML string to the file
        if (file_put_contents($file_path, $signed_invoice_string) !== false) {
            echo 'Invoice saved successfully to:\n\n' . $file_path . "<br>";
        } else {
            echo "Failed to save the invoice.\n";
        }


        // Generate QR Code
        $qrCode = new QrCode(
            data: $qr,
            encoding: new Encoding('UTF-8'),
            size: 300,
            margin: 10,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        // Writer
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        // Save to file
        $result->saveToFile(public_path('assets/phase-2.png'));
        echo 'qr code saved:\n\n' . public_path('assets/phase-2.png') . "<br>";

    }
}