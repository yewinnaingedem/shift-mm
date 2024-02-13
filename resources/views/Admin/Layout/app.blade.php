<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="{{asset('storage/style/main.css')}}">
        <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('storage/admin/css/styles.css')}}" rel="stylesheet" />
        <style>
            .list-style-none {
                list-style : none ;
            }
            .dropdown-toggle::after {
                display : none ;
            }
            .delete:hover  {
                background : #06CBA3 ;
            }
            .main-color {
                color : #06CBA3 ;
            }
            .customize {
                top : 0 ;
                right: 0;
                opacity: 0;
                transition: opacity 0.3s ease ;
            }
            .hoverEffect:hover  .customize {
                opacity: 1 ; 
            }
            .loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 0;
                height: 4px; /* or adjust as needed */
                background-color: #007bff; /* or any color you prefer */
                transition: width 0.3s ease;
                z-index: 9999; /* Ensure it appears above other content */
            }
        </style>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @yield('style')
    </head>
    <body class="sb-nav-fixed hidden">
        <!-- navBar -->
        <div id="loader" class="loader"></div>
        @section('navbar') 
            @include('Admin.Layout.navbar')
        @show 

        @section ('loader')
            @include('Admin.Layout.loader')
        @show 
        <!-- End NavBar -->
        <div id="layoutSidenav">
            <!-- Side Bar -->
            @section('side-bar')
                @include('Admin.Layout.sidebar')
            @show 
            <!-- end of side bar -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
                @section('footer')
                    @include('Admin.Layout.footer')
                @show 
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('storage/admin/js/scripts.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js" integrity="sha512-7dlzSK4Ulfm85ypS8/ya0xLf3NpXiML3s6HTLu4qDq7WiJWtLLyrXb9putdP3/1umwTmzIvhuu9EW7gHYSVtCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        @yield('script')
        <script>
            $(document).ready(function () {
                showLoader() ;
                $(window).on('load', function() {
                    hideLoader() ;
                });

                function showLoader () {
                    $('#loader').css('width' , '100%') ;
                }
                function hideLoader () {
                    $('#loader').css('display' , 'none') ;
                }
                $(document).on('click', '.copyIcon', (e) => {
                    let currentValue = $(e.currentTarget);
                    currentValue.removeClass('fa-copy').addClass('fa-check');
                    
                    // Find the phone number text within the same parent <td> element
                    let phoneNumber = currentValue.closest('td').find('.phoneID').text().trim();
                    
                    // Create a temporary <span> element to hold the text
                    let tempElement = $('<span>').text(phoneNumber).appendTo('body').css('position', 'absolute').css('left', '-9999px');
                    
                    // Create a range and select the text inside the temporary <span> element
                    let range = document.createRange();
                    range.selectNodeContents(tempElement[0]);
                    
                    // Clear any existing selection and add the new range
                    let selection = window.getSelection();
                    selection.removeAllRanges();
                    selection.addRange(range);
                    
                    try {
                        document.execCommand('copy');
                        selection.removeAllRanges();
                        swal({
                            title: "Auto close alert!",
                            text: "Phone number copied to clipboard!",
                            timer: 2000, 
                        });
                        setTimeout(() => {
                            currentValue.removeClass('fa-check').addClass('fa-copy');
                        }, 3000);
                    } catch (err) {
                        alert('Error copying to clipboard. Please try again. ' , err);
                    } finally {
                        tempElement.remove();
                    }
                });
                let routeSearch = $('input[name="routeSearch"]');
                $(document).on('keyup', routeSearch , function () {
                    let search = routeSearch.val().toLowerCase();
                    let record = $('.nav-link');
                    $('#dataSuggest').empty();
                    let addedValues = {}; // Object to keep track of added values
                    record.each(function () {
                        let value = $(this).text().toLowerCase().trim();
                        let href = $(this).attr('href');
                        if(value.includes(search) && !addedValues[value] && search !== "") { // Check if value is not already added
                            addedValues[value] = true; // Mark value as added
                            let innerLi = `
                                <li class="list-group-item">
                                    <a href="${href}" class="nav-link d-flex justify-content-between align-items-center">
                                        ${$(this).text()} 
                                    </a>
                                </li>
                            ` ;
                            $('#dataSuggest').append(innerLi);
                        }
                    });
                });
            })
        </script>
    </body>
</html>
