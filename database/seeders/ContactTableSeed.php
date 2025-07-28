<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactTableSeed extends Seeder
{

    public function run(): void
    {
        $contact = new Contact();
        $contact->image = '/_astro/contact.DGTOomyR.webp';
        $contact->help_label_1 = 'I can help you';
        $contact->help_label_2 = 'with:';
        $contact->range_label_1 = 'Your budget';
        $contact->range_label_2 = 'range is:';
        $contact->details_label_1 = 'Give me more details about';
        $contact->details_label_2 = 'your project:';
        $contact->contact_info_label = 'Contact info:';
        $contact->save();
    }
}
