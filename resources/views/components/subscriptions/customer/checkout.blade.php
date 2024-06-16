<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('img/check-out.png') }}" alt="" width="70">
            <h2>Checkout</h2>
            <p class="lead">You're just a few clicks away from your order! Complete the checkout to enjoy your new purchase.</p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-success">Your Cart</span>
                    <span class="badge bg-success rounded-pill">1</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 id="packName" class="my-0"></h6>
                            <small id="dspeed" class="text-body-secondary"></small>
                        </div>
                        <span class="text-body-secondary"><span id="packPrice"></span> BDT</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="my-0">VAT (0%)</span>
                        <strong>0</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="my-0">Discount</span>
                        <strong>0</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="my-0">Total (BDT)</span>
                        <strong id="totalPrice"></strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary" disabled>Redeem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Billing information</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="fullname" class="form-label">Fullname</label>
                            <input type="text" class="form-control" id="fullname" placeholder="" value="" required="" disabled>
                            <div class="invalid-feedback">
                                Valid fullname is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="" value="" required="" disabled>
                            <div class="invalid-feedback">
                                Valid Email is required.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="personal_id" class="form-label">Personal ID</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="number" class="form-control" id="personal_id" placeholder="" value="" required disabled>
                                <div class="invalid-feedback">
                                    Your PID is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="phone" placeholder="" value="" required="" disabled>
                                <div class="invalid-feedback">
                                    Valid Phone Number is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Residential Area" required="">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" required="">
                                <option value="Bangladesh" selected="">Bangladesh</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select" id="city" required="">
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chittagong" selected="">Chittagong</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Comilla">Comilla</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid City.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address">
                        <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="cash" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                            <label class="form-check-label" for="credit">Cash</label>
                        </div>

                        <div class="form-check">
                            <input id="mfs" name="paymentMethod" type="radio" class="form-check-input" required="" disabled>
                            <label class="form-check-label" for="mfs">bKash/Nagad</label>
                        </div>

                        <div class="form-check">
                            <input id="creditCard" name="paymentMethod" type="radio" class="form-check-input" required="" disabled>
                            <label class="form-check-label" for="credit">Credit card</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-6">
                            <button onclick="cancelOrder()" class="w-100 btn btn-danger" type="button">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button onclick="confirmOrder()" class="w-100 btn btn-success" type="button">Confirm Payment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer id="footer">
        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    © 2024 <strong><span>EarthLink LLC</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Developed by <a href="https://github.com/ujaRHR">Reajul Hasan Raju</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
</div>

@push('other-scripts')
<script>
    $(document).ready(function() {
        let selectedPack = localStorage.getItem('selectedPack');

        if (selectedPack === null || isNaN(selectedPack) || !Number.isInteger(Number(selectedPack))) {
            window.location.href = '/customer-subscriptions';
        }

    });

    function customerInfo() {
        let res = axios.post('/customer-profile').then(function(response) {
            $('#fullname').val(response.data.fullname);
            $('#personal_id').val(response.data.personal_id);
            $('#email').val(response.data.email);
            $('#phone').val(response.data.phone);
        })
    }

    function planInfo() {
        let id = localStorage.getItem('selectedPack');
        let res = axios.post('/plan-info', {
            id: id
        }).then(function(response) {
            $('#packName').text(response.data.name);
            $('#dspeed').text(response.data.dspeed);
            $('#packPrice').text(parseInt(response.data.price));
            $('#totalPrice').text(parseInt(response.data.price));
        })
    }

    function cancelOrder() {
        localStorage.removeItem('selectedPack');
        window.location.href = '/customer-subscriptions';
    }

    function confirmOrder() {

    }

    customerInfo();
    planInfo();
</script>
@endpush