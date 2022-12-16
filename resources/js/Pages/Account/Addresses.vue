<template>
    <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">

        <div class="modal fade" id="add-address-modal" tabindex="-1" role="dialog" aria-labelledby="add-address" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-address">Add Delivery Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Delivery Area</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Delivery Area">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-ui-pointer"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Complete Address
                                    </label>
                                    <input type="text" class="form-control" placeholder="Complete Address e.g. house number, street name, landmark">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Delivery Instructions
                                    </label>
                                    <input type="text" class="form-control" placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall">
                                </div>
                                <div class="form-group mb-0 col-md-12">
                                    <label for="inputPassword4">Nickname
                                    </label>
                                    <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                                        <label class="btn btn-info active">
                                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Home
                                        </label>
                                        <label class="btn btn-info">
                                            <input type="radio" name="options" id="option2" autocomplete="off"> Work
                                        </label>
                                        <label class="btn btn-info">
                                            <input type="radio" name="options" id="option3" autocomplete="off"> Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-primary" data-dismiss="modal">CANCEL
                        </button><button type="button" class="btn d-flex w-50 text-center justify-content-center btn-primary">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="delete-address-modal" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete-address">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0 text-black">Are you sure you want to delete this xxxxx?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-primary" data-dismiss="modal">CANCEL
                        </button><button type="button" class="btn d-flex w-50 text-center justify-content-center btn-primary">DELETE</button>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="font-weight-bold mt-0 mb-4">Manage Addresses</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-white card addresses-item mb-4 border border-primary shadow">
                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1 text-secondary">Home</h6>
                                <p class="text-black">Osahan House, Jawaddi Kalan, Ludhiana, Punjab 141002, India
                                </p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal"  href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white card addresses-item mb-4 shadow-sm">
                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1">Work</h6>
                                <p>NCC, Model Town Rd, Pritm Nagar, Model Town, Ludhiana, Punjab 141002, India
                                </p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2 pb-2">
            <div class="col-md-6">
                <div class="bg-white card addresses-item mb-4  shadow-sm">
                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1">Other</h6>
                                <p>Delhi Bypass Rd, Jawaddi Taksal, Ludhiana, Punjab 141002, India
                                </p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white card addresses-item mb-4  shadow-sm">
                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1">Other</h6>
                                <p>MT, Model Town Rd, Pritm Nagar, Model Town, Ludhiana, Punjab 141002, India
                                </p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-white card addresses-item shadow-sm">
                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1">Other</h6>
                                <p>GNE Rd, Jawaddi Taksal, Ludhiana, Punjab 141002, India
                                </p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white card addresses-item shadow-sm">
                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1">Other</h6>
                                <p>GTTT, Model Town Rd, Pritm Nagar, Model Town, Ludhiana, Punjab 141002, India
                                </p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
