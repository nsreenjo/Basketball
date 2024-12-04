<!-- Required Js -->
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<div class="floting-button">
    <a href="https://1.envato.market/zNkqj6"
       class="btn btn btn-danger buynowlinks d-inline-flex align-items-center gap-2" data-bs-toggle="tooltip"
       title="Buy Now">
        <i class="ph-duotone ph-shopping-cart"></i>
        <span>Buy Now</span>

    </a>
</div>



<script>
    change_box_container('false');
</script>

<script>
    layout_caption_change('true');
</script>

<script>
    // Retrieve the value from localStorage
    const rtlValue = localStorage.getItem('rtl');

    // Check if a value exists and call layout_rtl_change accordingly
    if (rtlValue === 'true') {
        layout_rtl_change('true');
    } else {
        layout_rtl_change('false');
    }
</script>


<script>
    preset_change('preset-1');
</script>

<script>
    main_layout_change('vertical');
</script>

<div class="pct-c-btn">
    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
        <i class="ph-duotone ph-gear-six"></i>
    </a>
</div>
<div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Settings</h5>
        <button type="button" class="btn btn-icon btn-link-danger ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"><i class="ti ti-x"></i></button>
    </div>
    <div class="pct-body customizer-body">
        <div class="offcanvas-body py-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="pc-dark">
                        <h6 class="mb-1">Theme Mode</h6>
                        <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
                        <div class="row theme-color theme-layout">
                            <div class="col-4">
                                <div class="d-grid">
                                    <button class="preset-btn btn active" data-value="true" onclick="changeThemeColor('light');"
                                            data-bs-toggle="tooltip" title="Light">
                                        <svg class="pc-icon text-warning">
                                            <use xlink:href="#custom-sun-1"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="false" onclick="changeThemeColor('dark');"
                                            data-bs-toggle="tooltip" title="Dark">
                                        <svg class="pc-icon">
                                            <use xlink:href="#custom-moon"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="default" onclick="layout_change_default();"
                                            data-bs-toggle="tooltip"
                                            title="Automatically sets the theme based on user's operating system's color scheme.">
                      <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                        <i class="ph-duotone ph-cpu"></i>
                      </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Theme Contrast</h6>
                    <p class="text-muted text-sm">Choose theme contrast</p>
                    <div class="row theme-contrast">
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn" data-value="true" onclick="layout_theme_contrast_change('true');"
                                        data-bs-toggle="tooltip" title="True">
                                    <svg class="pc-icon">
                                        <use xlink:href="#custom-mask"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn active" data-value="false"
                                        onclick="layout_theme_contrast_change('false');" data-bs-toggle="tooltip" title="False">
                                    <svg class="pc-icon">
                                        <use xlink:href="#custom-mask-1-outline"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Custom Theme</h6>
                    <p class="text-muted text-sm">Choose your primary theme color</p>
                    <div class="theme-color preset-color">
                        <a href="#!" data-bs-toggle="tooltip" title="Blue" class="active" data-value="preset-1"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Indigo" data-value="preset-2"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Purple" data-value="preset-3"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Pink" data-value="preset-4"><i class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Red" data-value="preset-5"><i class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Orange" data-value="preset-6"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Yellow" data-value="preset-7"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Green" data-value="preset-8"><i class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Teal" data-value="preset-9"><i class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Cyan" data-value="preset-10"><i class="ti ti-checks"></i></a>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Theme layout</h6>
                    <p class="text-muted text-sm">Choose your layout</p>
                    <div class="theme-main-layout d-flex align-center gap-1 w-100">
                        <a href="#!" data-bs-toggle="tooltip" title="Vertical" class="active" data-value="vertical">
                            <img src="{{ asset('assets/images/customizer/caption-on.svg') }}" alt="img" class="img-fluid" />
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Horizontal" data-value="horizontal">
                            <img src="{{ asset('assets/images/customizer/horizontal.svg') }}" alt="img" class="img-fluid" />
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Color Header" data-value="color-header">
                            <img src="{{ asset('assets/images/customizer/color-header.svg') }}" alt="img" class="img-fluid" />
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Compact" data-value="compact">
                            <img src="{{ asset('assets/images/customizer/compact.svg') }}" alt="img" class="img-fluid" />
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Tab" data-value="tab">
                            <img src="{{ asset('assets/images/customizer/tab.svg') }}" alt="img" class="img-fluid" />
                        </a>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Sidebar Caption</h6>
                    <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
                    <div class="row theme-color theme-nav-caption">
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn-img btn active" data-value="true"
                                        onclick="layout_caption_change('true');" data-bs-toggle="tooltip" title="Caption Show">
                                    <img src="{{ asset('assets/images/customizer/caption-on.svg') }}" alt="img" class="img-fluid" />
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn-img btn" data-value="false" onclick="layout_caption_change('false');"
                                        data-bs-toggle="tooltip" title="Caption Hide">
                                    <img src="{{ asset('assets/images/customizer/caption-off.svg') }}" alt="img" class="img-fluid" />
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="pc-rtl">
                        <h6 class="mb-1">Theme Layout</h6>
                        <p class="text-muted text-sm">LTR/RTL</p>
                        <div class="row theme-color theme-direction">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn active" data-value="false"
                                            onclick="setRtlLayoutCoockies(true);" data-bs-toggle="tooltip" title="LTR">
                                        <img src="{{ asset('assets/images/customizer/ltr.svg') }}" alt="img" class="img-fluid" />
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn" data-value="true" onclick="setRtlLayoutCoockies(false);"
                                            data-bs-toggle="tooltip" title="RTL">
                                        <img src="{{ asset('assets/images/customizer/rtl.svg') }}" alt="img" class="img-fluid" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item pc-box-width">
                    <div class="pc-container-width">
                        <h6 class="mb-1">Layout Width</h6>
                        <p class="text-muted text-sm">Choose Full or Container Layout</p>
                        <div class="row theme-color theme-container">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn active" data-value="false"
                                            onclick="change_box_container('false')" data-bs-toggle="tooltip" title="Full Width">
                                        <img src="{{ asset('assets/images/customizer/full.svg') }}" alt="img" class="img-fluid" />
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn" data-value="true" onclick="change_box_container('true')"
                                            data-bs-toggle="tooltip" title="Fixed Width">
                                        <img src="{{ asset('assets/images/customizer/fixed.svg') }}" alt="img" class="img-fluid" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-grid">
                        <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    function changeThemeColor(themeColor){
        // Save the value to localStorage
        localStorage.setItem('theme', themeColor);

        // Retrieve the value from localStorage
        const value = localStorage.getItem('theme');

        // Update layout based on the retrieved value
        if (value === 'light') {
            layout_change_default('light');
        } else {
            layout_change_default('dark');
        }

        // Reload the page to apply the changes
        // location.reload();
    }
</script>

<script>
    function setRtlLayoutCoockies(rtl) {
        // Save the value to localStorage
        localStorage.setItem('rtl', rtl);

        // Retrieve the value from localStorage
        const value = localStorage.getItem('rtl');

        // Update layout based on the retrieved value
        if (value === 'true') {
            layout_rtl_change('true');
        } else {
            layout_rtl_change('false');
        }

        // Reload the page to apply the changes
        location.reload();

    }
</script>

<script src="{{ asset('assets/js/plugins/simple-datatables.js') }}"></script>
<script>
    const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
        sortable: false,
        perPage: 5
    });
</script>


@livewireScripts

</body>
<!-- [Body] end -->

</html>
