@extends('pinlayout')

@section('content')

<div class="container-fluid">
    <!-- <header>
        <div class="limiter">
            <h3>Demo: Credit Card Validation With Payform.js</h3>
            <a href="http://tutorialzine.com/2016/11/simple-credit-card-validation-form/">Download</a>
        </div>
    </header> -->
    <div class="creditCardForm">
        <div class="heading">
            <h1>Confirm Purchase</h1>
        </div>
        <div class="payment">
            <form>
                <div class="form-group owner">
                    <label for="owner">Owner</label>
                    <input type="text" class="form-control" id="owner">
                </div>
                <div class="form-group CVV">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control" id="cvv">
                </div>
                <div class="form-group" id="card-number-field">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber">
                </div>
                <div class="form-group" id="expiration-date">
                    <label>Expiration Date</label>
                    <select>
                        <option value="01">January</option>
                        <option value="02">February </option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select>
                        <option value="16"> 2016</option>
                        <option value="17"> 2017</option>
                        <option value="18"> 2018</option>
                        <option value="19"> 2019</option>
                        <option value="20"> 2020</option>
                        <option value="21"> 2021</option>
                    </select>
                </div>
                <div class="form-group" id="credit_cards">
                    <img src="{{ asset('assets-c/images/visa.jpg')}}" id="visa">
                    <img src="{{ asset('assets-c/images/mastercard.jpg')}}" id="mastercard">
                    <img src="{{ asset('assets-c/images/amex.jpg')}}" id="amex">
                </div>
                <div class="form-group" id="pay-now">
                    <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <!-- <p class="examples-note">Here are some dummy credit card numbers and CVV codes so you can test out the form:</p> -->

    <!-- <div class="examples">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Card Number</th>
                        <th>Security Code</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Visa</td>
                        <td>4716108999716531</td>
                        <td>257</td>
                    </tr>
                    <tr>
                        <td>Master Card</td>
                        <td>5281037048916168</td>
                        <td>043</td>
                    </tr>
                    <tr>
                        <td>American Express</td>
                        <td>342498818630298</td>
                        <td>3156</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('assets-c/js/jquery.payform.min.js')}}" charset="utf-8"></script>
<script src="{{asset('assets-c/js/script.js')}}"></script>
@endsection
