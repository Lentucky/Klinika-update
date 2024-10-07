<?php include('partials/header.php') ?>
    
    <main>
        <div class="search-container">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <img src="img/image.png" alt="">
            </form>
        </div>

        <div class="transaction-container">
            <div class="card">
                <div class="dropdown">
                    <span>Mouse over me</span>
                    <div class="dropdown-content">
                        <p>Hello World!</p>
                    </div>
                </div>

                <h1>4000</h1>
                <h2>Total Revenue</h2>
                <h3>this month</h3>
            </div>
            <div class="card">
                <h1>Recent Transaction</h1>
                <h2>09-21-2024</h2>
                <h2>INV-001</h2>
                <h2>Anna Pasta</h2>
                <h2>Dagos</h2>
                <h2>1000</h2>
            </div>
        </div>

        <div class="table-container">
            <h3>Upcoming Appointments</h3>
            <table class="dash-table">
                <tr class="row-header">
                    <th>Patient Name</th>
                    <th>Invoice Number</th>
                    <th>Date of Service</th>
                    <th>Type of Service</th>
                    <th>Amount</th>
                    <th>Left to Pay</th>
                    <th>Status</th>
                    <th></th>
                </tr>

                <tr>
                    <td>Anna Dagos</td>
                    <td>Pasta</td>
                    <td>Sept 24, 2024</td>
                    <td>11:00 AM</td>
                    <td>Anna Dagos</td>
                    <td>Pasta</td>
                    <td>Sept 24, 2024</td>
                    <td>
                        <button class="main-button">Edit</button>
                    </td>
                </tr>

            </table>
        </div>
    </main>

<?php include('partials/footer.php') ?>