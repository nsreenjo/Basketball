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
                            <li class="breadcrumb-item" aria-current="page">Activity Details</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Activity Details</h2>
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
                            <!-- Activity Image -->
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
                                                <!-- Use the image path from the activity -->
                                                <img src="{{ asset('storage/' . $activity->image) }}" class="d-block w-100" alt="Activity images" />
                                            </div>
                                            <!-- Add more carousel items as needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Activity Details -->
                            <div class="col-md-6">
                                <div class="product-details">
                                    <h3>Activity Details</h3>
                                    <ul>
                                        <li><strong>Name:</strong> {{ $activity->name }}</li>
                                        <li><strong>Description:</strong> {{ $activity->description }}</li>
                                        <li><strong>Coach:</strong> {{ $activity->coach->user->firstName }} {{ $activity->coach->user->lastName }}</li>
                                        <li><strong>Start Date:</strong> {{ $activity->startDate }}</li>
                                        <li><strong>End Date:</strong> {{ $activity->endDate }}</li>
                                        <li><strong>Duration (Hours):</strong> {{ $activity->durationHours }}</li>
                                        <li><strong>Location:</strong> {{ $activity->location }}</li>
                                        <li><strong>Price:</strong> {{ $activity->price }}</li>
                                        <li><strong>Type:</strong> {{ $activity->type }}</li>
                                        <li><strong>Status:</strong> {{ $activity->status }}</li>
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
