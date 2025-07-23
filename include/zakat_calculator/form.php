<?php
echo '
<div class="contact-form">
         <div class="container">
            <div class="row gutter-y-30">
                <div class="col-lg-8">
                    <div class="contact-form-inner pb-0 pt-2">
                        <form action="#" class="zakat-calculator">
                            <h4 class="text-center mb-1">Base Nisab on Value of</h4>
                            <div class="form-group">
                                <label><i class="fa-solid fa-layer-group"></i></label>
                                <select name="threshold" class="loan-type " data-select2-id="select2-data-1-ikbn" tabindex="-1" aria-hidden="true">
                                    <option value="106078.00">Silver</option>
                                    <option value="1273204.00">Gold</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="capital" min="0" class="form-control" placeholder="Value of silver and gold you possess" required="">
                                </div>
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="capital" min="0" class="form-control" placeholder="Cash in hand and in bank accounts" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="capital" min="0" class="form-control" placeholder="Savings for the future" required="">
                                </div>
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="capital" min="0" class="form-control" placeholder="Money you have loaned" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="capital" min="0" class="form-control" placeholder="Business investments" required="">
                                </div>
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="capital" min="0" class="form-control" placeholder="Business Assets/Stock value" required="">
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="liabilities" min="0" class="form-control" placeholder="Liabilities / Money owed (borrowed or credit)" required="">
                                </div>
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="liabilities" min="0" class="form-control" placeholder="Employees’ salaries" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 inquiry-form-group-one">
                                    <input type="text" name="liabilities" min="0" class="form-control" placeholder="Other outgoings due (tax, rent, utilities)" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 text-center p-2 mt-1" style="border:1px solid black;">
                                    <h3 class="mb-1">Your current assets are worth</h3>
                                    <h3 class="mb-1">Rs. <span class="zakat-assets-total"> 0</span> </h3>
                                </div>
                                <div class="col-md-6 col-12 text-center p-2 mt-1" style="border:1px solid black;">
                                    <h3 class="text-success mb-1">Payable Zakat is</h3>
                                    <h3 class="mb-1">Rs. <span class="zakat-dues-total"> 0</span> </h3>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="button" id="resetForm" class="btn btn-lg btn-danger m-3">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-right">
                        <h3>Nisab Values</h3>
                        <div class="contact-details">
                            <h5 class="text-warning">Silver Nisab</h5>
                            <p>₨.106,078.00</p>
                            <p>(612.36g)</p>
                        </div>
                        <div class="contact-details">
                            <h5 class="text-warning">Gold Nisab</h5>
                            <p>₨.1,273,204.00</p>
                            <p>(87.48g)</p>
                        </div>
                        <hr style="color:white;">
                        <div class="contact-details">
                            <h5 class="text-light">Guidance on Weight:b</h5>
                            <p>Nisab in tola = 7.5 tola</p>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
    
';
?>