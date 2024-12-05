@extends('layouts.dashboard')

<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                            <li class="breadcrumb-item" aria-current="page">Products Details</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Products Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Product Image -->
                            <div class="col-md-6">
                                <div class="product-image">
                                    <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider" data-bs-ride="carousel">
                                        <div class="carousel-inner bg-light rounded position-relative">
                                            <div class="card-body position-absolute end-0 top-0">
                                                <div class="form-check prod-likes">
                                                    <input type="checkbox" class="form-check-input" />
                                                    <i data-feather="heart" class="prod-likes-icon"></i>
                                                </div>
                                            </div>
                                            <!-- Add carousel items here -->
                                            <div class="carousel-item active">
                                                <!-- Use the image path from the user's profile_image field -->
                                                <img src="{{ asset('storage/' . $student->user->image) }}" class="d-block w-100" alt="Product images" />
                                            </div>
                                            <!-- Add more carousel items as needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="col-md-6">
                                <div class="product-details">
                                    <h3>Student Details</h3>
                                    <ul>
                                        <li><strong>First Name:</strong> {{ $student->user->firstName }}</li>
                                        <li><strong>Gender:</strong> {{ $student->gender }}</li>
                                        <li><strong>Nationality:</strong> {{ $student->Nationality }}</li>
                                        <li><strong>Birthday:</strong> {{ $student->Birthday }}</li>
                                        <li><strong>Level of Player:</strong> {{ $student->levelOfPlayer }}</li>
                                        <li><strong>Position:</strong> {{ $student->position }}</li>
                                        <li><strong>Weight:</strong> {{ $student->weight }}</li>
                                        <li><strong>Height:</strong> {{ $student->height }}</li>
                                        <li><strong>schoolName:</strong> {{ $student->schoolName }}</li>
                                        <li><strong>Age Category:</strong> {{ $student->ageCategory }}</li>
                                        <li><strong>Address:</strong> {{ $student->address }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Image styling */
    .product-image {
        margin-right: 15px;
    }

    .product-image .carousel-inner img {
        border-radius: 10px;
    }

    .product-details {
        padding-left: 0px;
    }

    .product-details h2 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .product-details ul {
        list-style-type: none;
        padding: 0;
    }

    .product-details ul li {
        font-size: 16px;
        margin-bottom: 20px;
        color: #555;
    }

    .product-details ul li strong {
        font-weight: bold;
    }

    .prod-likes {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .prod-likes-icon {
        color: #f44336;
    }

</style>
