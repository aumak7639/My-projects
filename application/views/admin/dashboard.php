<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Property Today</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-4">
                <a href="<?=base_url()?>admin/enquiry_list">
                    <div class="card-box bg-pattern">
                        <div class="row">
                            <div class="col-6">
                             
                                   
                                   

                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAC30lEQVRoge2ZS08TURTHf2dm2lJAHgoCIo8ESExcoxJYaeKGEBPiyp2J8hX8KhCI8Ru4Ma40LsT4IOELKNDyFAIJpe3QAp3rokKQItOh99IQ+m+aTJM755xfz7n3zGmhooqutiToDaNralgpJhS0l+J45X38y8yL7qFSbABYQW/wFOOlBg+QjiUH+6di06XaCQwA3C7VKYCoPMS917Gvpdg5D4A2iYLUfPJBKRCO34LWqdiwKGtCZVLtnps4r58CCYJCHUH0T879mHnZ8whIBrHjmwFR1jgaar7Qbh7i8Dodd/v7J+c+BrVTTAlpqfmTEuRUiKDlVLY9IJwOEXRPlA3AqQmfCXH/TbyoI7ZsAE0PW8+ESP7aGSwGwvcUMqVoVy0dz3v9lg36LShrH9ChSw9gtIQya7tkV128TA5xLEJNEaq7axE78DPkf2UMYP3dMrsLhU3VqQ/T8qSDUH1Yix9jJXSws4eCY+/8az+RZevTmjY/xjJghYTGgWZq+uqwIzbbs5skZrcAcFdd8NDy9RkDuDnSiV1lH32+dreR7b8AIqDkHNPUKTJWQseDB3DjqaPr6K1qRNM+vpBjNPUzweb07/zjc0i4PtSizbbxTuzGU2x8WAFPYUVs2kY6Cd+o0mbfOMDm5zU8T2GFLdpHu7UGD6ZLyFPs7+wBUNtXrz14MJ0BS6jprSO3myPUoKdxnZTxEmp93GHUvvFTKLuVYev7Oul4oFm9aJnNgKdYeruAl80hAl3P+gg3RLS6MJoBJYIVlvyIZYPl6HdnNAMi0Pm0h/RiiqrmKE5tSLsP45vYqQ5Rf6fRmP1LP5FVAMqtKwQg+Z+gsu6euWgKteS3IACAhTgh5r/NXxTEksCYb1h+C9omFxUAXg6VdVH7GdTBPvlRXb82Xg0EmtWK7wOWjUSqwXYQLxc4MFMqBmCZw/8ILBsJR03G41vzJ+W7B5SSMfIQprWEiG/NV1RRRf/qDz5W527xPAaCAAAAAElFTkSuQmCC"/>
                             
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <?php
                                $query = $this->db->query("SELECT * FROM tbl_enquiry where status= '0' ");

                              ?>


                                    <h3 class="text-dark my-1"><span
                                            data-plugin="counterup"><?php echo $query->num_rows();?></span></h3>
                                    <p class="text-muted mb-0 text-truncate">Total No Of Enquires</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                    </a>
                </div> <!-- end col -->

                <div class="col-md-4">
                    <div class="card-box bg-pattern">
                    <a href="<?=base_url()?>admin/user-registration">
                        <div class="row">
                            <div class="col-6">
                                
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAFfUlEQVR4nO2bS2yUVRTHfwUi2MaiTXzGSEvttEBcELXEaGQhKvGBysIYBF34WCgLAhp8bNi504WaWA0mWjGaaBQfMSTVxEfUSBoXGjG2JYPRBh9TpIrYqK2Lcy/fmW/u97rzzXyA80++zH2ce+75zj3nfuc+po1i0AGsAXqBOWACGAH+LEiepqENeBD4DXlx/RwCthmakxLzgJepffHws4smKmG+R5tlwHrEhFcAR4BfU7R7ANiq8hPAa8AocDrQZcovAqaBzxooixcGgA9wj9r7QH9M2w6qzf45YKGqXwjspNod2hskixdW4fbbsA8PRrRfp+jGqH55i4WIVVi6GxokS2Z0ApOK+d/AW8DjwNsmb+t+BE5z8NimaJ6J6WtI0W111OchS2Y8qphWgEtC9YPAlKJ52MFDK2Aopq8kBeQhS2aMKoZ3RdDco2j2OupvVPXjuF1gEbBf0V3fIFky43fF8NwImvMUzbSjvh3xS0uzk2olLAKeV/VTwKkNkiUzpnPqVLuBjf6GgGepHvk5YEuDZckEbXZ3R9DcS7LZtSFBTlIgNEx0IJSXLJnwiGJYofbzsorqieehGF5tyOSm3UGb/Rbio8A8ZTkmUBI6gX2IaQH8A+wBvgNKwFqCiPIHYDniq3FoB64CLjT5MSSAOVqALKkwiHvUwsHHpXl01kxZsiw6+oGnkZELYwS4HxkJF1YCl5EuMJk1fEaQ2D5vWargs+rqB65EFi9TwIcxna1EIj+fsLQCbAZeyUmWpuNaxKeTZv2451/g1kYKmWQBZyFmdkEKXrPAbmQEzge+BhabuqNIzF5OwacTuAU4x+SnkcnyF5MvATch+wtxOAR8BHybos8adCA+NkO2ERs37Z9UZRNAT8b+u4BvFI/HVJ1eMaZ5Mi+PFyMBhI/JWgXoFdvqLJ0rXE21Ei2yKsB+FZzzkMsFXgJuV/m9wKfAXwkCH0EmrMPAT6asgrjRbEJbF+YjE1unyfcgLtQH3IZYaVzbASQuWGDKJk1ZbFywwghrNbfZQ/BB1T7NtlYc9ihe6zxliV0ehyeSmwms4k3gKY9Ou1W67NFeQ5v+2R7tvwC2q/z6MEFYARer9OseHUK+Cjis0l2RVPF4V6VrJsOwApar9FeeHXardNmTh8WMSrv2B9JgUqVrIlGtgFOQkxqQeWDMs8NulS578mgatAL6CGbMA/gfU3WrdNmTR9OgFbBMpfd58msDlpj0HPC9J5+mQStA+79X+Ih88+2BxkGS1/eFI8oCfBXQrdJlTx5NRUsB6rekyv93Cugh+M5WCJaeWbFEpQ/4CtVMWAXkYf6QvwX0qrTvoMTCfvcHVFleCrAWMI9gdbmL5JWhpb8G2KDKP69DrkTcSbBi2pBAG4c/DI9ZApe6Q/HelIKHprfPG3XIRIhXFawFvIis9+3WlS8mkYjyS4IYYKmq761pUYulofxuYGMdMuk+a26PWAXMAa86Gq9GLGIY+CRFZ2uA6xChk5DGNZ7AfUyeBiVEdm3RmfcnfkaUc9BTCIAdBOa3Q5VHuUYUfVaEt85mcByW6Dhgk3l0cHSm+U27GVFCRqyUREh218gKzb+CbK/XHJZaF9gIvKDKhz07fc90fB/Bud/xgF6qN1eOwY52XqNh+TRiROuB8+Uh+XDhpEdLAUULUDRaCihagKLRUoD51Scw4y7ClNjv4HdcwwZC9voayJ1+X6xFLjm/U49QzYRVwCxyKlwvxpAFzAmD1hxQtABFo6WAogUoGi0FFC1A0WgpoGgBisaCZJJYpLm1eXkovd2z3AV9O7UhiDxQMPC5tJj3E7V2sfWxJ1FJLnDCLW4URkO/TiRdlu4jWNy4Lk2lubXZSNjbqS7ZzgCuAD5G/mnqxH91oD0pPM28VgAAAABJRU5ErkJggg=="/>
                               

                              
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <?php
                                $no_of_users = $this->db->query("SELECT * FROM tbl_general_users where status= '0' ");

                              ?>

                                    <h3 class="text-dark my-1"><span
                                            data-plugin="counterup"><?php echo $no_of_users->num_rows();?></span></h3>
                                    <p class="text-muted mb-0 text-truncate">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                    </a>
                </div> <!-- end col -->
                <div class="col-md-4">
                <a href="<?=base_url()?>admin/builder-registration">
                    <div class="card-box bg-pattern">
                        <div class="row">
                            <div class="col-6">
                               
                                <img src="data:image/png;base64,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"/>

                                 
                                  

                                </a>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <?php
                                $no_of_builder = $this->db->query("SELECT * FROM tbl_builder_register where status= '0' ");

                              ?>


                                    <h3 class="text-dark my-1"><span
                                            data-plugin="counterup"><?php echo $no_of_builder->num_rows();?></span></h3>
                                    <p class="text-muted mb-0 text-truncate">Total  Builders</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                    </a>



                </div> <!-- end col -->

                </div>
                <!-- end row-->

                <div class="row">
                <div class="col-md-4">
                <a href="<?=base_url()?>admin/builder-registration">
                    <div class="card-box bg-pattern">
                    
                        <div class="row">
                            <div class="col-6">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAABjUlEQVR4nO2abVKDMBRFTx2ni9L637qwfuxLN1JKtxF/AGNKI6TacEN4ZybTToCbyx1eqiFgGGN8ABXgeq0CtgXq3RAS79qpBL01cAQuA0IucN3QuTFNqVcDh/beOczAcCq9PW0aDngJiPhCsf1j5KC3aY/VK++k1cAAoeNj1/1GLnoO4CligLN3Qf+Rq+I85q039uhtaWbT/gAn4P1+v9noOcDFlECpRJdA0VgAagNqLAC1ATUWgNqAGgtAbUCNBaA2oMYCUBtQYwGoDaixANQG1FgAagNqLAC1ATV+AJ+9Y1+F9wHNUrj/TsBfGg8tl5fWZyXw7H0PPSb9N0Yl9b3CdQks9s3Qpe3Y6LxMzlv7WUOzSeC/mxPm2nbQbBPZ87NRYgnt3N78mgR0g8xCN8XPYIo55apmcyflnLKb8D7+TIo5JWnNTkVsDaeaQ4Is/k9hC0BtQI0FoDagxgJQG1BjAagNqLEA1AbUWABqA2oeEUC37DzWOh51nuN2Kf9uHhHAZP+6Zja2YRgF8A2LsNhqZE41hwAAAABJRU5ErkJggg=="/>

                            
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <?php
                                $no_of_post = $this->db->query("SELECT * FROM tbl_property_details where status= '0' ");

                              ?>


                                    <h3 class="text-dark my-1"><span
                                            data-plugin="counterup"><?php echo $no_of_post->num_rows();?></span></h3>
                                    <p class="text-muted mb-0 text-truncate">Total Properties post</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                    </a>



                </div> <!-- end col -->
                <div class="col-md-4">
                <a href="<?=base_url()?>admin/builder-registration">
                    <div class="card-box bg-pattern">

                        <div class="row">
                            <div class="col-6">
                               
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAABD0lEQVRoge2YQQrCMBBFn+7FC9il9Cp61SLu1I13UXDdResB6qIKNaQJSZOmLfNgoDA0+Z82fyAgCIIwZTLgBNRAM3LVwBnIh4gvEwhXqwR2PgZOExD/q6JP5MpgoAY2jqZjUQNbXcNkoImjxRut1vXYKkIjBlIT0sCFNu4y4ObRD45r1HWzOvPo20pLyBRS11Lft/Vd1wfkDKRHDHRQD6lrPziuKXHlPyZd+8lTKDaSQjZkEltKy+x/IROSQoGRFJokizbwHk2FnaqvYTJwjyDEFy8tOdO5Wtz7GIA2twvaTzi28Ir2etMo3jQHhqLOkSh7LTqFZoEYSI0YMPDsPD8i7hONI/D61iGxFkFYLB9BLTS2sC0d3gAAAABJRU5ErkJggg=="/>
 
                            
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <?php
                                $no_of_property_post = $this->db->query("SELECT * FROM tbl_builder_register where status= '0' ");

                              ?>


                                    <h3 class="text-dark my-1"><span
                                            data-plugin="counterup"><?php echo $no_of_builder->num_rows();?></span></h3>
                                    <p class="text-muted mb-0 text-truncate">Total  Requirements</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                    </a>



                </div> <!-- end col -->




                </div>






            </div>
        </div>
    </div>