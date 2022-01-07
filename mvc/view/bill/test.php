<div class="modal-header">
    // <h5 class="modal-title" id="exampleModalLabel">فاکتور شماره:invoice_id</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

<div id="permitPrint" style="width:842px; ">
    <div style="padding-right: 30px;">
        <table style="width: 100%" class="">
            <tr>
                <td>
                    <img style="margin-top: 5px;" src="<?=baseUrl()?>/build/images/logo-1-min.png">
                    </td>
                <td style="padding-right: 120px">
                    <table>
                        <tbody>
                        <tr>
                            <td class="td-header">
                                <h5 style="font-weight: bold">شرکت خدماتی شهرک صنعتی شمس آباد</h5>
                                </td>
                            </tr>
                        <tr>
                            <td class="td-header">
                                <h5 style="font-weight: bold">صورتحساب فروش کالا و خدمات</h5>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                <td style="width: 200px; " >
                    <table class="table-01">
                        <tbody >
                        <tr>
                            <td class="tr-padding border-bottom">
                                <span class="font-bold" style="font-size: 14px; font-family:"B Nazanin";">شماره فاکتور:</span>
                                </td>
                            <td class="tr-padding border-bottom ">
                                <span>bill_serial_mahfa</span>
                                </td>
                            </tr>
                        <tr>
                            <td class="tr-padding ">
                                <span class="font-bold" style="font-size: 14px; font-family: "B Nazanin";">تاریخ:</span>
                                </td>
                            <td>
                                <span style="padding-left: 10px">date</span>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        <table class="table-02" style="width: 100%;">
            <tr>
                <td colspan="2">
                    <table style="width: 100%;" class="border-bottom">
                        <tr>
                            <td style="padding-right: 0px; colspan="2">
                            <span class="font-bold">مشخصات فروشنده</span>
                            </td>
                            <td style="text-align:left;">
                                <span dir: "rtl" class="font-bold">شماره قرارداد:&nbsp</span>
                                </td>
                            <td style="text-align:right;">
                                <i dir: "rtl"> contract_number </i>
                                </td>
                            <td style="text-align:center;">
                                <span class="font-bold">مشخصات خریدار</span>
                                </td>
                            </tr>

                        </table>
                    </td>

                </tr>
            <tr style="width: 100%">
                <td style="width: 50%;border-left: 1px solid">
                    <table class="" style="padding-right: 5px">
                        <tr>
                            <td>
                                <span class="font-bold">نام شخص حقیقی/حقوقی:</span>
                                </td>
                            <td>
                                <span>شرکت خدماتی شهرک صنعتی شمس آباد</span>
                                </td>
                            </tr>
                        <tr>
                            <td>
                                <span class="font-bold">شماره اقتصادی:</span>
                                <span>411481866918</span>
                                </td>
                            <td style="text-align: center">
                                <span class="font-bold">شناسه ملی:</span>
                                <span>1481866918</span>
                                </td>
                            </tr>
                        <tr>
                            <td>
                                <span class="font-bold">کدپستی:</span>
                                <span>1481866918</span>
                                </td>
                            <td style="text-align: center">
                                <span class="font-bold">شماره تماس:</span>
                                <span>56231545</span>
                                </td>
                            </tr>
                        <tr>
                            <td colspan="2">
                                <span class="font-bold">نشانی:</span>
                                <span style="font-size: 7pt"> تهران شهر ری حسن آباد شهرک صنعتی شمس آباد بلوار بهارستان نبش بلوار گلستان ساختمان فناوری </span>
                                </td>
                            </tr>

                        </table>
                    </td>
                <td >
                    <table >
                        <tr>
                            <td>
                                <span class="font-bold">نام شخص حقیقی/حقوقی:</span>
                                </td>
                            <td>
                                <span>company_name</span>
                                </td>
                            </tr>
                        <tr>
                            <td>
                                <span class="font-bold">شماره اقتصادی:</span>
                                <span>economic_code</span>
                                </td>
                            <td style="text-align: center">
                                <span class="font-bold">شناسه ملی:</span>
                                <span>national_number</span>
                                </td>
                            </tr>
                        <tr>
                            <td>
                                <span class="font-bold">کدپستی:</span>
                                <span>postal_code</span>
                                </td>
                            <td style="text-align: center">
                                <span class="font-bold">شماره تماس:</span>
                                <span>tel</span>
                                </td>
                            </tr>
                        <tr>
                            <td colspan="2">
                                <span class="font-bold">نشانی:</span>
                                <span style="font-size: 7pt">address</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        <span style="margin-right: 50%">ارائه خدمات</span>
        <table style=" width: 100%">
            <thead>
            <tr style="text-align: center; font-size: 7pt; font-family: "B Titr ";">
            <th style="text-align: center; border: 1px solid">ردیف</th>
            <th style="text-align: center; border: 1px solid">کد کالا</th>
            <th style="text-align: center; border: 1px solid">شرح کالا یا خدمات</th>
            <th style="text-align: center; border: 1px solid">مقدار</th>
            <th style="text-align: center; border: 1px solid">واحد اندازه گیری</th>
            <th style="text-align: center; border: 1px solid">مبلغ واحد(ریال)</th>
            <th style="text-align: center; border: 1px solid">مبلغ کل(ریال)</th>
            <th style="text-align: center; border: 1px solid">مبلغ تخفیف(ریال)</th>
            <th style="text-align: center; border: 1px solid">مبلغ کل پس از تخفیف(ریال)</th>
            <th style="text-align: center; border: 1px solid">مالیات و عوارض(ریال)</th>
            <th style="text-align: center; border: 1px solid">جمع مبلغ کل بعلاوه مالیات و عوارض ارزش افزوده(ریال)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: center; border: 1px solid"><span>1</span></td>
                <td style="text-align: center; border: 1px solid"><span>--</span></td>
                <td style="text-align: center; border: 1px solid; font-size: 8pt;"><span>آب بهاء</span></td>
                <td style="text-align: center; border: 1px solid"><span>water_qty</span></td>
                <td style="text-align: center; border: 1px solid; font-size: 8pt;"><span>متر مکعب</span></td>
                <td style="text-align: center; border: 1px solid"><span>water_rate</span></td>
                <td style="text-align: center; border: 1px solid"><span>water_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>0</span></td>
                <td style="text-align: center; border: 1px solid"><span>water_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>water_vat</span></td>
                <td style="text-align: center; border: 1px solid"><span>water_totality</span></td>
                </tr>
            <tr>
                <tr>
                <td style="text-align: center; border: 1px solid"><span>2</span></td>
                <td style="text-align: center; border: 1px solid"><span>--</span></td>
                <td style="text-align: center; border: 1px solid; font-size: 8pt;""><span>آبونمان</span></td>
                <td style="text-align: center; border: 1px solid"><span>1</span></td>
                <td style="text-align: center; border: 1px solid"><span>عدد</span></td>
                <td style="text-align: center; border: 1px solid"><span>abonman_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>abonman_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>0</span></td>
                <td style="text-align: center; border: 1px solid"><span>abonman_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>0</span></td>
                <td style="text-align: center; border: 1px solid"><span>abonman_amount</span></td>
                </tr>
            <tr>
                <tr>
                <td style="text-align: center; border: 1px solid"><span>3</span></td>
                <td style="text-align: center; border: 1px solid"><span>--</span></td>
                <td style="text-align: center; border: 1px solid; font-size: 7pt;"><span>خدمات آبرسانی</span></td>
                <td style="text-align: center; border: 1px solid"><span>1</span></td>
                <td style="text-align: center; border: 1px solid"><span>عدد</span></td>
                <td style="text-align: center; border: 1px solid"><span>khadamat_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>khadamat_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>0</span></td>
                <td style="text-align: center; border: 1px solid"><span>khadamat_amount</span></td>
                <td style="text-align: center; border: 1px solid"><span>0</span></td>
                <td style="text-align: center; border: 1px solid"><span>khadamat_amount</span></td>
                </tr>
            // <tr>
                // <td class="font-bold" colspan="6" style="text-align: center; border: 1px solid;"><span>جمع کل (ریال)</span></td>
                // <td style="text-align: center; border: 1px solid;"><span>water_amount</span></td>
                // <td style="text-align: center; border: 1px solid;"><span>0</span></td>
                // <td style="text-align: center; border: 1px solid;"><span>water_amount</span></td>
                // <td style="text-align: center; border: 1px solid;"><span>water_vat</span></td>
                // <td style="text-align: center; border: 1px solid;"><span>sum_totality</span></td>
                // </tr>
            <tr>
                <td style="border: 0px"></td>
                <td style="border: 0px"></td>
                <td style="border: 0px"></td>
                <td style="border: 0px"></td>
                <td style="border: 0px"></td>
                <td style="border: 0px"></td>
                <td style="border: 0px"></td>
                <td style="border: 0px"></td>
                <td colspan="2" class="" style="text-align: center; border: 1px solid; font-size: 7pt;"><span>بدهی/ بستانکاری معوق</span></td>
                <td style="text-align: center; border: 1px solid"><span>debit</span></td>
                </tr>
            <tr>
                <td style="border: 0px"></td>
                <td colspan="6" class="font-bold" style="border: 1px solid;padding-right: 20px;"> مبلغ قابل پرداخت:&nbsp &nbsp sum_totalityریال &nbsp 
                    <br> <span>مهلت پرداخت:&nbsp &nbsp &nbsp &nbsp &nbsp &nbspusance_date</span>
                    </td>
                <td style="border: 0px"></td>
                <td colspan="2" class="" style="text-align: center; border: 1px solid;font-size: 7pt;"><span>جمع بدهی/بستانکاری تا </span><span>تاریخ صدور این صورتحساب</span> +
                    </td>
                <td style="text-align: center; border: 1px solid;"><span>sum_totality</span></td>
                <td style="border: 0px"></td>
                </tr>
            <tr>
                <td style="border: 0px"></td>
                <td colspan="6" style="border: 1px solid">
                    <span class="font-bold" style="padding-right: 20px">شرایط و نحوه تسویه:</span>
                    <?  $payed="payed"; echo $payed; ?>
                    <span class="font-bold" style="padding-right: 20px">کدرهگیری:</span>

                    // <span style="padding-right: 20px">reference</span>
                    </td>
                <td style="border: 0px"></td>
                </tr>
            <tr>
            </tr>
            </tbody>
            </table>
      <table class="left" style="width: 350px; border: 1px solid; border-radius: 1em;">
            <tr>
                <td colspan="6" style="text-align: center">
                    <span >مشخصات دوره و کارکرد کنتور</span>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td style="border: 1px solid" width="58">دوره</td>
                <td style="border: 1px solid" width="40">قبلی</td>
                <td style="border: 1px solid" width="40">فعلی</td>
                <td style="border: 1px solid" width="60">میزان مصرف</td>
                <td style="border: 1px solid" width="60">شروه دوره</td>
                <td style="border: 1px solid" width="66">پایان دوره</td>
            </tr>
<tr style="text-align: center;  border: 1px solid;">
    <td style="border: 1px solid">اردیبهشت و خرداد</td>
    <td style="border: 1px solid">44444</td>
    <td style="border: 1px solid">99999</td>
    <td style="border: 1px solid">1580</td>
    <td style="border: 1px solid">1398/01/01</td>
    <td style="border: 1px solid">1398/01/01</td>
</tr>
            <tr>
                    <td style="border-left: 1px solid" colspan="3">مساحت زمین:1111111111</td>
                    <td style="border-right: 1px solid" colspan="3">قطر انشعاب:</td>
            </tr>
        </table>
        <table class="right" style="margin-right: 20px; width: 407px">
            <tr>
                <td style="border: 1px solid">
                    <span>شناسه قبض:</span>
                    <span>55555555555555</span>
                    </td>
                <td style="border: 1px solid">
                    <span>شناسه پرداخت:</span>
                    <span>555555555555555</span>
                </td>
            </tr>
            <tr>
                <td colspan="6" style="font-size: 7pt;">
                    <br>
                    <span style=" line-height: 5px"> بند ب ماده 2 آیین نامه اجرایی قانون نحوه واگذاری مالکیت و اداره امور شهرک های صنعتی:</span><br>
                    <span style=" line-height: 5px">الف- تاسیسات قسمت های مشترک از قبیل چاه آب، پمپ آب و شبکه های آبرسانی و توزیع آب، منبع آب، شبکه گاز رسانی،</span><br>
                    <span style=" line-height: 5px">  شبکه مخابرات، شبکه جمع آوری فاضلاب، شبکه برق رسانی و شبکه روشنایی و حق الامتیازهای مربوط
</span>
                </td>
            </tr>
        </table>
        <br>
            <table class="right" style="margin-right: 20px; width: 407px">
                <tr class="font-bold">
                    <td style="border-top: 1px solid; ">
                        <span>مهر و امضاء فروشنده</span>
                        </td>
                    <td width="" style="text-align: left; border-top: 1px solid; ">
                        <span>مهر و امضاء خریدار</span>
                        </td>
                    </tr>
                </table>

        </div>
    <br>
    </div>