<?php include('partials/header.php') ?>
    
    <main>
        <div class="search-container">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <img src="img/image.png" alt="">
            </form>
        </div>


        <div class="button-container">
            <button class="btn main-button">Create New Record</button>
        </div>

        <div class="table-container">
            <h3>Upcoming Appointments</h3>
            <table class="dash-table">
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Anna Dagos</td>
                    <td>Pasta</td>
                    <td>
                        <a class="btn main-button" href="patient-edit.php">Edit</a>
                        <a class="btn main-button">Delete</a>
                    </td>
                </tr>

            </table>
        </div>
    </main>

<?php include('partials/footer.php') ?>