<!-- Favicon -->
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/icon">
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('backoffice/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('backoffice/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backoffice/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backoffice/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<link rel="shortcut icon" href="{{ asset('backoffice/media/logos/favicon.ico') }}" />
<style type="text/css">
	.invalid-feedback {
	    display: block;
	}
	.form-control[type="file"] {
        padding: 0.45rem 1rem;
    }
    .header .header-top {
    	background-color: #003c80 !important;
    }
    .header-menu .menu-nav > .menu-item.menu-item-active > .menu-link .menu-text {
    	color: #F38F1D !important;
    }
    .btn.btn-primary {
    	background-color: #F38F1D;
    	border-color: #F38F1D;
    }
    .header .header-top {
	    background-color: #3699FF !important;
    }
    .header-fixed.header-bottom-enabled .header {
        height: 70px;
    }
    .header-fixed.header-bottom-enabled .wrapper {
        padding-top: 100px;
    }
</style>
@stack('style')