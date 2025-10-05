<?php
//@include('ZATCA.templates.invoice_billing_reference_template');
require __DIR__ . '/invoice_billing_reference_template.php';

/**
 * Maybe use a templating engine instead of str replace.
 * This works for now though
 *
 * cbc:InvoiceTypeCode: 388: BR-KSA-05 Tax Invoice according to UN/CEFACT codelist 1001, D.16B for KSA.
 *  name="0211010": BR-KSA-06 starts with "02" Simplified Tax Invoice. Also explains other positions.
 * cac:AdditionalDocumentReference: ICV: KSA-16, BR-KSA-33 (Invoice Counter number)
 */

return /* XML */
    <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2">
 <ext:UBLExtensions>
  <ext:UBLExtension>
   <ext:ExtensionURI>urn:oasis:names:specification:ubl:dsig:enveloped:xades</ext:ExtensionURI>
   <ext:ExtensionContent>
    <x1:UBLDocumentSignatures xmlns:x1="urn:oasis:names:specification:ubl:schema:xsd:CommonSignatureComponents-2">
     <x2:SignatureInformation xmlns:x2="urn:oasis:names:specification:ubl:schema:xsd:SignatureAggregateComponents-2">
      <cbc:ID>urn:oasis:names:specification:ubl:signature:1</cbc:ID>
      <x3:ReferencedSignatureID xmlns:x3="urn:oasis:names:specification:ubl:schema:xsd:SignatureBasicComponents-2">urn:oasis:names:specification:ubl:signature:Invoice</x3:ReferencedSignatureID>
     </x2:SignatureInformation>
    </x1:UBLDocumentSignatures>
   </ext:ExtensionContent>
  </ext:UBLExtension>
 </ext:UBLExtensions>
 <cbc:ProfileID>reporting:1.0</cbc:ProfileID>
 <cbc:ID>SET_INVOICE_SERIAL_NUMBER</cbc:ID>
 <cbc:UUID>SET_TERMINAL_UUID</cbc:UUID>
 <cbc:IssueDate>2024-09-17</cbc:IssueDate>
 <cbc:IssueTime>15:06:05</cbc:IssueTime>
<cbc:InvoiceTypeCode name="0100000">388</cbc:InvoiceTypeCode>
 

 <cbc:DocumentCurrencyCode>SAR</cbc:DocumentCurrencyCode>
 <cbc:TaxCurrencyCode>SAR</cbc:TaxCurrencyCode>
 <cac:AdditionalDocumentReference>
  <cbc:ID>ICV</cbc:ID>
  <cbc:UUID>SET_INVOICE_COUNTER_NUMBER</cbc:UUID>
 </cac:AdditionalDocumentReference>
 <cac:AdditionalDocumentReference>
  <cbc:ID>PIH</cbc:ID>
  <cac:Attachment>
   <cbc:EmbeddedDocumentBinaryObject mimeCode="text/plain">SET_PREVIOUS_INVOICE_HASH</cbc:EmbeddedDocumentBinaryObject>
  </cac:Attachment>
 </cac:AdditionalDocumentReference>
 <cac:AdditionalDocumentReference>
  <cbc:ID>QR</cbc:ID>
 </cac:AdditionalDocumentReference>
 <cac:Signature>
  <cbc:ID>urn:oasis:names:specification:ubl:signature:Invoice</cbc:ID>
  <cbc:SignatureMethod>urn:oasis:names:specification:ubl:dsig:enveloped:xades</cbc:SignatureMethod>
 </cac:Signature>
 <cac:AccountingSupplierParty>
  <cac:Party>
   <cac:PartyIdentification>
    <cbc:ID schemeID="CRN">SET_COMMERCIAL_REGISTRATION_NUMBER</cbc:ID>
   </cac:PartyIdentification>
   <cac:PostalAddress>
    <cbc:StreetName>SET_STREET_NAME</cbc:StreetName>
    <cbc:BuildingNumber>SET_BUILDING_NUMBER</cbc:BuildingNumber>
    <cbc:PlotIdentification>SET_PLOT_IDENTIFICATION</cbc:PlotIdentification>
    <cbc:CitySubdivisionName>SET_CITY_SUBDIVISION</cbc:CitySubdivisionName>
    <cbc:CityName>SET_CITY</cbc:CityName>
    <cbc:PostalZone>SET_POSTAL_NUMBER</cbc:PostalZone>
    <cac:Country>
     <cbc:IdentificationCode>SA</cbc:IdentificationCode>
    </cac:Country>
   </cac:PostalAddress>
   <cac:PartyTaxScheme>
    <cbc:CompanyID>SET_VAT_NUMBER</cbc:CompanyID>
    <cac:TaxScheme>
     <cbc:ID>VAT</cbc:ID>
    </cac:TaxScheme>
   </cac:PartyTaxScheme>
   <cac:PartyLegalEntity>
    <cbc:RegistrationName>SET_VAT_NAME</cbc:RegistrationName>
   </cac:PartyLegalEntity>
  </cac:Party>
 </cac:AccountingSupplierParty>
 <cac:AccountingCustomerParty>
  <cac:Party>
   <cac:PartyIdentification>
    <cbc:ID schemeID="NAT">311111111111113</cbc:ID>
   </cac:PartyIdentification>
   <cac:PostalAddress>
    <cbc:StreetName>SET_STREET_NAME</cbc:StreetName>
    <cbc:BuildingNumber>SET_BUILDING_NUMBER</cbc:BuildingNumber>
    <cbc:PlotIdentification>SET_PLOT_IDENTIFICATION</cbc:PlotIdentification>
    <cbc:CitySubdivisionName>SET_CITY_SUBDIVISION</cbc:CitySubdivisionName>
    <cbc:CityName>SET_CITY</cbc:CityName>
    <cbc:PostalZone>SET_POSTAL_NUMBER</cbc:PostalZone>
    <cac:Country>
     <cbc:IdentificationCode>SA</cbc:IdentificationCode>
    </cac:Country>
   </cac:PostalAddress>
   <cac:PartyTaxScheme>
    <cac:TaxScheme>
     <cbc:ID>VAT</cbc:ID>
    </cac:TaxScheme>
   </cac:PartyTaxScheme>
   <cac:PartyLegalEntity>
    <cbc:RegistrationName>SET_VAT_NAME</cbc:RegistrationName>
   </cac:PartyLegalEntity>
  </cac:Party>
 </cac:AccountingCustomerParty>
 <cac:Delivery>
  <cbc:ActualDeliveryDate>SET_ISSUE_DATE</cbc:ActualDeliveryDate>
 </cac:Delivery>
 <cac:PaymentMeans>
  <cbc:PaymentMeansCode>10</cbc:PaymentMeansCode>
 </cac:PaymentMeans>
 <cac:AllowanceCharge>
  <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
  <cbc:AllowanceChargeReason>discount</cbc:AllowanceChargeReason>
  <cbc:Amount currencyID="SAR">0.00</cbc:Amount>
  <cac:TaxCategory>
   <cbc:ID schemeID="UN/ECE 5305" schemeAgencyID="6">S</cbc:ID>
   <cbc:Percent>15</cbc:Percent>
   <cac:TaxScheme>
    <cbc:ID schemeID="UN/ECE 5153" schemeAgencyID="6">VAT</cbc:ID>
   </cac:TaxScheme>
  </cac:TaxCategory>
 </cac:AllowanceCharge>
 PARSE_LINE_ITEMS
</Invoice>

XML;