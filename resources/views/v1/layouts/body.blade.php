@extends('v1.layouts.html')

@section('html')
    <div class="page-separator">
        <div class="page-separator-top">
            <header class="mb-4">
                @include('v1.layouts.blocks.header')
                @include('v1.layouts.blocks.mainMenu')
            </header>
            <main class="mb-5">
                @yield('body')
            </main>
        </div>
        <div class="page-separator-bottom">
            <footer>
                @include('v1.layouts.blocks.subFooter')
                @include('v1.layouts.blocks.footer')
            </footer>
        </div>
    </div>

    <div class="footer-moblie-box d-sm-none">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a href="/">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.15722 20.2714V17.2047C8.1572 16.4246 8.79312 15.7908 9.58101 15.7856H12.4671C13.2587 15.7856 13.9005 16.4209 13.9005 17.2047V17.2047V20.2809C13.9003 20.9432 14.4343 21.4845 15.103 21.5H17.0271C18.9451 21.5 20.5 19.9607 20.5 18.0618V18.0618V9.33784C20.4898 8.59083 20.1355 7.88935 19.538 7.43303L12.9577 2.1853C11.8049 1.27157 10.1662 1.27157 9.01342 2.1853L2.46203 7.44256C1.86226 7.89702 1.50739 8.59967 1.5 9.34736V18.0618C1.5 19.9607 3.05488 21.5 4.97291 21.5H6.89696C7.58235 21.5 8.13797 20.9499 8.13797 20.2714V20.2714" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="">
                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="9.76657" cy="10.2664" r="8.98856" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path d="M16.0183 16.9849L19.5423 20.4997" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="/categories">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2855 1.5H18.5521C19.9036 1.5 21 2.6059 21 3.97018V7.2641C21 8.62735 19.9036 9.73429 18.5521 9.73429H15.2855C13.933 9.73429 12.8366 8.62735 12.8366 7.2641V3.97018C12.8366 2.6059 13.933 1.5 15.2855 1.5Z" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.44892 1.5H6.71449C8.06703 1.5 9.16341 2.6059 9.16341 3.97018V7.2641C9.16341 8.62735 8.06703 9.73429 6.71449 9.73429H3.44892C2.09638 9.73429 1 8.62735 1 7.2641V3.97018C1 2.6059 2.09638 1.5 3.44892 1.5Z" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.44892 13.2656H6.71449C8.06703 13.2656 9.16341 14.3715 9.16341 15.7368V19.0297C9.16341 20.394 8.06703 21.4999 6.71449 21.4999H3.44892C2.09638 21.4999 1 20.394 1 19.0297V15.7368C1 14.3715 2.09638 13.2656 3.44892 13.2656Z" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2855 13.2656H18.5521C19.9036 13.2656 21 14.3715 21 15.7368V19.0297C21 20.394 19.9036 21.4999 18.5521 21.4999H15.2855C13.933 21.4999 12.8366 20.394 12.8366 19.0297V15.7368C12.8366 14.3715 13.933 13.2656 15.2855 13.2656Z" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="/user/login">
                        <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8.57897" cy="5.77803" r="4.77803" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.00002 17.2016C0.998732 16.8657 1.07385 16.5339 1.2197 16.2313C1.67736 15.316 2.96798 14.8308 4.03892 14.6112C4.81128 14.4463 5.59431 14.3362 6.38217 14.2816C7.84084 14.1535 9.30793 14.1535 10.7666 14.2816C11.5544 14.3369 12.3374 14.447 13.1099 14.6112C14.1808 14.8308 15.4714 15.2702 15.9291 16.2313C16.2224 16.8481 16.2224 17.5642 15.9291 18.181C15.4714 19.1421 14.1808 19.5814 13.1099 19.7919C12.3384 19.9636 11.5551 20.0768 10.7666 20.1306C9.57937 20.2313 8.38659 20.2496 7.19681 20.1855C6.92221 20.1855 6.65677 20.1855 6.38217 20.1306C5.59663 20.0775 4.81632 19.9642 4.04807 19.7919C2.96798 19.5814 1.68652 19.1421 1.2197 18.181C1.0746 17.8749 0.999552 17.5403 1.00002 17.2016Z" stroke="#495057" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
@endsection