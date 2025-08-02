<?php

namespace Database\Seeders;

use App\Models\Popup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopupTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $popups = new Popup();
        $popups->main_title ='BREVAN HOWARD';
        $popups->description ='
        <h2>References to Future Returns</h2>
        <p>
                        References to future returns are not promises or even estimates of actual returns that an
                        investor may achieve. Any forecasts and other material contained in this website are for
                        illustrative purposes only and are not to be relied upon as advice or interpreted as a
                        recommendation. Brevan Howard gives no representations, warranties or undertakings that any
                        indicative performance or return will be achieved in the future or that the investment
                        objectives and policies from time to time of our funds will be met. Past performance is no
                        guarantee and is not indicative of future results. While our funds are subject to market risks
                        common to other types of investments, including market volatility, the funds employ certain
                        trading techniques, such as the use of leverage and other speculative investment practices that
                        may increase the risk of investment loss.
                    </p>

                     <h2>Stop-Loss and Stop-Limit Orders for Futures Contracts</h2>
                     <p>
                        Some regulated exchanges may permit our funds to enter into stop-loss or stop-limit orders for
                        security futures contracts, which are intended to limit our exposure to losses due to market
                        fluctuations but won’t necessarily limit potential losses to the intended amount, as market
                        conditions may make it impossible to execute the order or to get the stop price.
                    </p>
        ';
        $popups->footer_title ='DISCLOSURE ACCEPTANCE';
        $popups->footer_desc ='By clicking ‘I Accept’ you acknowledge you have read and understand these disclosures.';
        $popups->page2_heading ='Contact Brevan Howard';
        $popups->page2_sub_heading ='Thank you for visiting Brevan Howard. For further information contact:';
        $popups->page2_detail_title = json_encode([
            'Investor Relations / Fund Enquiries:',
            'Press Enquiries:',
            'All Other Enquiries:',
            'Social:',
        ]);

        $popups->page2_detail_desc = json_encode([
            '<p>ir@brevanhoward.com</p><p>UK: +44 20 7022 6250</p><p>US: +1 332 266 5060</p>',

            '<p>Hillary Yaffe</p>
     <p>Head of Communications</p>
     <p>+1 (212) 602–7938</p>
     <p>Hillary.Yaffe@brevanhoward.com</p>
     <br>
     <p>Peregrine Communications Group</p>
     <p><a href="#">Hillary.Yaffe@brevanhoward.com</a></p>',

            '<p class="second-page-section-title">+44 20 7022 6200</p>',

            '<p><a href="#">LinkedIn/Brevan Howard</a></p>',
        ]);


        $popups->save();
    }
}
