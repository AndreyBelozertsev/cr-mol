<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($seo_information->title) ? $seo_information->title : env('APP_NAME') }}</title>
    <meta name="description" content="{{ isset($seo_information->description) ? $seo_information->description : '' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:title"
        content="{{ isset($seo_information->title) ? $seo_information->title : env('APP_NAME') }}" />
    <meta property="og:image" content="{{ isset($seo_information->open_graph) ? $seo_information->open_graph : '' }}" />
    <meta property="og:description"
        content="{{ isset($seo_information->description) ? $seo_information->description : '' }}" />
    @vite(['resources/css/app.css', 'resources/css/scss/main.scss'])
</head>

<body id="home">
    <header class="header mt-4">
        <div class="container">
            <div class="header__inner flex items-center justify-between py-2">
                <a class="logo max-w-[260px] mr-2" href="/">
                    <svg width="100%" viewBox="0 0 296 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.0936 23.5938L6.29812 14.3737L14.1284 6.78893H11.7271L1.80872 16.3919V6.78893H0V23.5938H1.80872V18.5484L4.94076 15.5912L11.6577 23.5938H14.0936Z"
                            fill="white" />
                        <path
                            d="M25.2244 24.0091C26.7299 23.9991 28.0436 23.6322 29.1659 22.9084C30.2881 22.1844 31.1617 21.163 31.7853 19.844C32.4094 18.5254 32.7259 16.9686 32.7355 15.1734C32.7259 13.3682 32.4094 11.8093 31.7853 10.4965C31.1617 9.18419 30.2881 8.17058 29.1659 7.45644C28.0436 6.74271 26.7299 6.38154 25.2244 6.37293C24.385 6.37929 23.5962 6.51764 22.8581 6.78821C22.1196 7.05899 21.455 7.42426 20.8633 7.88444C20.2721 8.34399 19.7773 8.86115 19.379 9.43611V6.78863H17.5703V30H19.379V20.8761C20.0684 21.8442 20.9159 22.6055 21.9232 23.1603C22.9296 23.7152 24.0302 23.9979 25.2244 24.0091ZM24.9109 22.3714C24.1271 22.3632 23.3757 22.2172 22.657 21.9342C21.9388 21.6501 21.2954 21.2772 20.728 20.816C20.16 20.3546 19.7105 19.8534 19.379 19.3119V11.0005C19.7105 10.4602 20.16 9.96474 20.728 9.51441C21.2954 9.06387 21.9388 8.7027 22.657 8.43008C23.3757 8.15746 24.1271 8.01726 24.9109 8.01008C26.1662 8.0232 27.2311 8.34051 28.1053 8.96323C28.9793 9.58533 29.6445 10.4337 30.1012 11.5082C30.5577 12.5821 30.7876 13.804 30.7911 15.1734C30.7876 16.5433 30.5577 17.768 30.1012 18.8478C29.6445 19.9276 28.9793 20.7818 28.1053 21.4096C27.2311 22.0375 26.1662 22.3581 24.9109 22.3714Z"
                            fill="white" />
                        <path
                            d="M37.2988 6.78877V23.5928H45.6516C46.7667 23.5811 47.7032 23.3495 48.4623 22.8977C49.2207 22.4461 49.794 21.8458 50.1816 21.0966C50.5686 20.348 50.7629 19.5207 50.7646 18.6159C50.7629 17.7112 50.5686 16.8847 50.1816 16.1369C49.794 15.3888 49.2207 14.7894 48.4623 14.3389C47.7032 13.8877 46.7667 13.6567 45.6516 13.6452H39.1073V6.78877H37.2988ZM45.5123 15.2416C46.2547 15.2471 46.8735 15.3945 47.3689 15.6833C47.864 15.9726 48.2352 16.3698 48.4826 16.8755C48.73 17.3809 48.8538 17.961 48.8538 18.6159C48.853 19.2704 48.7267 19.8476 48.475 20.3474C48.2231 20.8475 47.8492 21.2396 47.3536 21.5227C46.8579 21.8062 46.2442 21.9503 45.5123 21.9554H39.1073V15.2416H45.5123ZM55.4633 23.5928V6.78877H53.6205V23.5928H55.4633Z"
                            fill="white" />
                        <path
                            d="M76.9778 23.5938V6.78893H74.4738L69.0431 20.4277L63.5425 6.78893H61.1074V23.5938H62.9161V9.25992L68.7299 23.5938H69.391L75.1348 9.25992V23.5938H76.9778Z"
                            fill="white" />
                        <path
                            d="M101.863 23.5938V6.78893H96.0178L91.9441 16.8088L87.8003 6.78893H81.9902V23.5938H86.4077V12.667L90.9344 23.5938H92.9538L97.4455 12.667V23.5938H101.863Z"
                            fill="white" />
                        <path
                            d="M114.033 24.0098C115.428 24.0016 116.675 23.7662 117.773 23.3042C118.872 22.8422 119.806 22.2045 120.574 21.3914C121.343 20.5784 121.929 19.6409 122.332 18.5789C122.735 17.5169 122.938 16.382 122.941 15.1736C122.938 13.9739 122.735 12.8457 122.332 11.7888C121.929 10.7316 121.343 9.79728 120.574 8.9866C119.806 8.1755 118.872 7.53946 117.773 7.07786C116.675 6.61645 115.428 6.38134 114.033 6.37274C112.647 6.38134 111.407 6.61645 110.313 7.07786C109.219 7.53946 108.289 8.1755 107.523 8.9866C106.756 9.79728 106.171 10.7316 105.769 11.7888C105.366 12.8457 105.163 13.9739 105.16 15.1736C105.163 16.382 105.366 17.5169 105.769 18.5789C106.171 19.6409 106.756 20.5784 107.523 21.3914C108.289 22.2045 109.219 22.8422 110.313 23.3042C111.407 23.7662 112.647 24.0016 114.033 24.0098ZM114.033 20.0773C113.115 20.0656 112.339 19.8377 111.703 19.3933C111.067 18.9491 110.583 18.3579 110.253 17.62C109.922 16.8819 109.757 16.0663 109.755 15.1736C109.757 14.2924 109.922 13.4852 110.253 12.7524C110.583 12.0192 111.067 11.4309 111.703 10.9878C112.339 10.544 113.115 10.3169 114.033 10.3052C114.952 10.3169 115.732 10.544 116.373 10.9878C117.014 11.4309 117.503 12.0192 117.839 12.7524C118.175 13.4852 118.345 14.2924 118.347 15.1736C118.345 16.0663 118.175 16.8819 117.839 17.62C117.503 18.3579 117.014 18.9491 116.373 19.3933C115.732 19.8377 114.952 20.0656 114.033 20.0773Z"
                            fill="white" />
                        <path
                            d="M124.662 24.0098C126.084 24.0118 127.277 23.7025 128.241 23.0822C129.206 22.4616 129.971 21.5185 130.537 20.2527C131.103 18.9872 131.5 17.387 131.727 15.4526L132.284 10.6528H137.608V23.5937H142.025V6.78923H128.421L127.342 14.9315C127.17 16.2799 126.962 17.3546 126.717 18.1554C126.472 18.9563 126.181 19.5316 125.844 19.8799C125.507 20.2292 125.113 20.3993 124.662 20.3915V24.0098Z"
                            fill="white" />
                        <path
                            d="M154.205 24.0098C155.599 24.0016 156.847 23.7662 157.945 23.3042C159.044 22.8422 159.978 22.2045 160.746 21.3914C161.515 20.5784 162.101 19.6409 162.504 18.5789C162.907 17.5169 163.11 16.382 163.113 15.1736C163.11 13.9739 162.907 12.8457 162.504 11.7888C162.101 10.7316 161.515 9.79728 160.746 8.9866C159.978 8.1755 159.044 7.53946 157.945 7.07786C156.847 6.61645 155.599 6.38134 154.205 6.37274C152.819 6.38134 151.579 6.61645 150.485 7.07786C149.391 7.53946 148.46 8.1755 147.694 8.9866C146.928 9.79728 146.343 10.7316 145.94 11.7888C145.538 12.8457 145.335 13.9739 145.332 15.1736C145.335 16.382 145.538 17.5169 145.94 18.5789C146.343 19.6409 146.928 20.5784 147.694 21.3914C148.46 22.2045 149.391 22.8422 150.485 23.3042C151.579 23.7662 152.819 24.0016 154.205 24.0098ZM154.205 20.0773C153.287 20.0656 152.51 19.8377 151.874 19.3933C151.239 18.9491 150.755 18.3579 150.424 17.62C150.094 16.8819 149.928 16.0663 149.926 15.1736C149.928 14.2924 150.094 13.4852 150.424 12.7524C150.755 12.0192 151.239 11.4309 151.874 10.9878C152.51 10.544 153.287 10.3169 154.205 10.3052C155.123 10.3169 155.904 10.544 156.545 10.9878C157.186 11.4309 157.675 12.0192 158.011 12.7524C158.347 13.4852 158.517 14.2924 158.519 15.1736C158.517 16.0663 158.347 16.8819 158.011 17.62C157.675 18.3579 157.186 18.9491 156.545 19.3933C155.904 19.8377 155.123 20.0656 154.205 20.0773Z"
                            fill="white" />
                        <path
                            d="M164.832 27.873H169.283V23.5925H179.624V27.873H184.041V19.7293H182.197V6.78892H168.588L167.509 14.9302C167.38 15.9393 167.231 16.7592 167.062 17.3893C166.893 18.0192 166.7 18.5064 166.484 18.8512C166.267 19.1953 166.022 19.4438 165.749 19.5955C165.476 19.7478 165.17 19.8503 164.832 19.9033V27.873ZM172.452 10.6525H177.78V19.7293H169.98C170.503 19.2431 170.928 18.6243 171.255 17.8728C171.582 17.1218 171.807 16.2334 171.93 15.2081L172.452 10.6525Z"
                            fill="white" />
                        <path
                            d="M200.533 2.33134C200.528 1.8972 200.419 1.50488 200.206 1.15477C199.993 0.804264 199.708 0.525496 199.353 0.318058C198.997 0.110826 198.602 0.0048542 198.167 0.000141144C197.733 0.0048542 197.338 0.110826 196.982 0.318058C196.626 0.525496 196.342 0.804264 196.129 1.15477C195.916 1.50488 195.807 1.8972 195.801 2.33134C195.807 2.77696 195.916 3.17707 196.129 3.5323C196.342 3.88753 196.626 4.16957 196.982 4.37783C197.338 4.58609 197.733 4.69246 198.167 4.69718C198.602 4.69246 198.997 4.58609 199.353 4.37783C199.708 4.16957 199.993 3.88753 200.206 3.5323C200.419 3.17707 200.528 2.77696 200.533 2.33134ZM193.158 2.33134C193.153 1.8972 193.047 1.50488 192.84 1.15477C192.633 0.804264 192.354 0.525496 192.003 0.318058C191.653 0.110826 191.261 0.0048542 190.827 0.000141144C190.381 0.0048542 189.981 0.110826 189.626 0.318058C189.27 0.525496 188.989 0.804264 188.78 1.15477C188.572 1.50488 188.466 1.8972 188.461 2.33134C188.466 2.77696 188.572 3.17707 188.78 3.5323C188.989 3.88753 189.27 4.16957 189.626 4.37783C189.981 4.58609 190.381 4.69246 190.827 4.69718C191.261 4.69246 191.653 4.58609 192.003 4.37783C192.354 4.16957 192.633 3.88753 192.84 3.5323C193.047 3.17707 193.153 2.77696 193.158 2.33134ZM194.72 24.0093C195.595 24.0087 196.456 23.9209 197.303 23.7449C198.149 23.569 198.943 23.3081 199.685 22.9623C200.427 22.6163 201.08 22.1881 201.643 21.6777L199.694 18.8256C199.326 19.1749 198.883 19.4733 198.368 19.7218C197.852 19.9704 197.318 20.1606 196.764 20.2933C196.21 20.4263 195.691 20.4929 195.207 20.4943C194.254 20.4853 193.435 20.3058 192.748 19.9561C192.06 19.606 191.517 19.138 191.115 18.5526C190.715 17.967 190.467 17.3164 190.372 16.601H202.861V15.6274C202.85 13.783 202.493 12.169 201.791 10.7858C201.089 9.40222 200.109 8.32383 198.85 7.55087C197.592 6.77831 196.122 6.38557 194.441 6.37307C193.158 6.38086 191.985 6.61085 190.925 7.06385C189.864 7.51603 188.948 8.14469 188.174 8.94799C187.402 9.75171 186.804 10.6841 186.383 11.7457C185.961 12.8071 185.748 13.95 185.742 15.1756C185.749 16.5264 185.977 17.7444 186.426 18.8291C186.875 19.9138 187.505 20.8418 188.314 21.6127C189.123 22.3842 190.072 22.9754 191.16 23.3868C192.248 23.7977 193.435 24.005 194.72 24.0093ZM198.58 13.6112H190.302C190.353 13.1875 190.469 12.7581 190.651 12.3246C190.832 11.8913 191.089 11.4907 191.42 11.1234C191.751 10.7561 192.166 10.4599 192.665 10.235C193.164 10.0098 193.756 9.89437 194.441 9.88801C195.17 9.89478 195.791 10.0137 196.306 10.2449C196.82 10.4757 197.241 10.7776 197.567 11.1496C197.893 11.5217 198.138 11.9234 198.3 12.3541C198.463 12.7852 198.557 13.2043 198.58 13.6112Z"
                            fill="white" />
                        <path
                            d="M209.416 23.5938L213.905 17.1222L214.707 17.9921V23.5938H219.157V17.9921L219.958 17.1222L224.447 23.5938H229.945L223.125 14.4085L229.738 6.78893H224.308L219.157 12.8771V6.78893H214.707V12.8771L209.556 6.78893H204.127L210.739 14.4085L203.918 23.5938H209.416Z"
                            fill="white" />
                        <path
                            d="M236.593 23.5938V16.881H243.56V23.5938H247.977V6.78893H243.56V13.0176H236.593V6.78893H232.176V23.5938H236.593Z"
                            fill="white" />
                        <path
                            d="M252.363 6.78893V23.5938H262.526C263.78 23.5812 264.842 23.3246 265.711 22.8247C266.578 22.3251 267.238 21.6594 267.689 20.827C268.14 19.9946 268.366 19.0734 268.37 18.0633C268.37 17.0642 268.153 16.1506 267.72 15.3235C267.288 14.4958 266.638 13.8328 265.773 13.334C264.908 12.8353 263.826 12.5795 262.526 12.5666H256.781V6.78893H252.363ZM261.864 16.2525C262.495 16.2628 262.983 16.4337 263.327 16.7664C263.672 17.0984 263.846 17.5309 263.85 18.0633C263.846 18.5954 263.672 19.0275 263.327 19.3602C262.983 19.6922 262.495 19.8632 261.864 19.8734H256.781V16.2525H261.864ZM275.013 23.5938V6.78893H270.563V23.5938H275.013Z"
                            fill="white" />
                        <path
                            d="M283.608 23.5938L290.75 13.0514V23.5938H295.167V6.78893H290.715L283.782 16.9482V6.78893H279.365V23.5938H283.608ZM293.357 2.04433L291.408 0.38238C290.918 1.07705 290.323 1.6147 289.624 1.99555C288.925 2.37619 288.138 2.56907 287.267 2.57461C286.359 2.56682 285.553 2.36963 284.852 1.98243C284.149 1.59482 283.561 1.06147 283.09 0.38238L281.142 2.04433C281.866 2.99809 282.756 3.74523 283.813 4.28657C284.867 4.82792 286.019 5.10382 287.267 5.11407C288.53 5.10382 289.684 4.82792 290.729 4.28657C291.775 3.74523 292.65 2.99809 293.357 2.04433Z"
                            fill="white" />
                        <path d="M212.503 5.03857V0.300329H208.795V5.03857H209.305V0.750255H211.993V5.03857H212.503Z"
                            fill="white" />
                        <path
                            d="M223.229 5.15572C223.653 5.15285 224.024 5.04934 224.34 4.84559C224.657 4.64123 224.903 4.35344 225.078 3.9812C225.254 3.60958 225.344 3.17052 225.346 2.66443C225.344 2.15547 225.254 1.716 225.078 1.34561C224.903 0.975829 224.657 0.690091 224.34 0.488599C224.024 0.287312 223.653 0.185643 223.229 0.182979C222.991 0.184824 222.77 0.223772 222.56 0.300024C222.353 0.37648 222.165 0.479582 221.999 0.609128C221.833 0.738673 221.693 0.884617 221.581 1.04655V0.30043H221.07V6.84473H221.581V4.27227C221.775 4.5453 222.013 4.75991 222.298 4.91631C222.581 5.0727 222.893 5.15244 223.229 5.15572ZM223.141 4.69411C222.919 4.69165 222.708 4.65066 222.505 4.57071C222.302 4.49036 222.12 4.38542 221.96 4.25546C221.8 4.1251 221.673 3.98407 221.581 3.83136V1.48765C221.673 1.33536 221.8 1.19577 221.96 1.06869C222.12 0.941806 222.302 0.840138 222.505 0.763067C222.708 0.686201 222.919 0.646639 223.141 0.644589C223.495 0.648279 223.794 0.737855 224.04 0.913315C224.286 1.08878 224.475 1.32818 224.604 1.63093C224.733 1.93389 224.797 2.27826 224.799 2.66443C224.797 3.05081 224.733 3.39599 224.604 3.70038C224.475 4.00498 224.286 4.24562 224.04 4.42272C223.794 4.59982 223.495 4.69021 223.141 4.69411Z"
                            fill="white" />
                        <path
                            d="M235.708 5.15576C236.099 5.15453 236.448 5.08853 236.753 4.95734C237.058 4.82636 237.329 4.63758 237.563 4.3912L237.298 4.05708C237.095 4.27374 236.862 4.43732 236.597 4.54841C236.333 4.65931 236.05 4.71485 235.747 4.71526C235.468 4.71342 235.216 4.66361 234.992 4.56563C234.769 4.46744 234.578 4.33196 234.418 4.15896C234.26 3.98616 234.135 3.7861 234.045 3.5594C233.957 3.33228 233.906 3.08898 233.894 2.82968H237.858V2.69214C237.858 2.34922 237.809 2.02659 237.71 1.72506C237.614 1.42354 237.47 1.15707 237.28 0.926469C237.089 0.695256 236.856 0.514261 236.579 0.383076C236.3 0.251891 235.982 0.185069 235.619 0.182609C235.289 0.184659 234.986 0.249638 234.707 0.377133C234.431 0.504424 234.189 0.681318 233.984 0.908022C233.779 1.13432 233.621 1.3971 233.506 1.69595C233.393 1.99501 233.336 2.31724 233.334 2.66262C233.338 3.15416 233.441 3.58646 233.644 3.95952C233.844 4.33258 234.123 4.62405 234.478 4.83456C234.832 5.04487 235.242 5.15207 235.708 5.15576ZM237.337 2.42751H233.894C233.902 2.21864 233.945 2.00875 234.021 1.79803C234.096 1.58711 234.205 1.39341 234.347 1.21631C234.488 1.03941 234.664 0.897163 234.875 0.789345C235.084 0.681322 235.33 0.625978 235.609 0.623108C235.906 0.626388 236.163 0.682755 236.38 0.791803C236.597 0.901671 236.776 1.04556 236.915 1.22369C237.056 1.40222 237.161 1.59613 237.231 1.80623C237.3 2.01634 237.335 2.22336 237.337 2.42751Z"
                            fill="white" />
                        <path
                            d="M250.625 5.03857V0.300329H249.92L248.389 4.1457L246.837 0.300329H246.15V5.03857H246.661V0.996843L248.301 5.03857H248.487L250.106 0.996843V5.03857H250.625Z"
                            fill="white" />
                        <path
                            d="M259.685 5.03857L262.393 1.03579V5.03857H262.903V0.300329H262.403L259.704 4.24368V0.300329H259.195V5.03857H259.685Z"
                            fill="white" />
                        <path
                            d="M271.929 5.03857L273.196 3.10503H274.639V5.03857H275.157V0.300329H272.802C272.499 0.302994 272.238 0.365921 272.023 0.489317C271.81 0.612508 271.646 0.779363 271.531 0.989874C271.419 1.20039 271.363 1.43795 271.361 1.70258C271.363 1.96925 271.417 2.20395 271.521 2.40627C271.628 2.60878 271.777 2.76969 271.968 2.88919C272.161 3.00869 272.386 3.07756 272.646 3.0954L271.322 5.03857H271.929ZM272.843 2.6551C272.634 2.65347 272.458 2.61288 272.316 2.53253C272.175 2.45238 272.068 2.34067 271.999 2.19821C271.927 2.05596 271.89 1.89054 271.89 1.70258C271.89 1.51482 271.929 1.34961 272.003 1.20715C272.077 1.06449 272.183 0.95318 272.325 0.872829C272.466 0.792479 272.64 0.751689 272.843 0.750255H274.639V2.6551H272.843Z"
                            fill="white" />
                    </svg>
                </a>
                <nav class="menu hidden xl:block">
                    <ul class="flex items-center gap-2 text-base font-commissioner-300">
                        <li>
                            <a href="#etapy" class="px-1 2xl:px-4">Этапы проведения</a>
                        </li>
                        <li>
                            <a href="#nominacii" class="px-1 2xl:px-4">Номинации</a>
                        </li>
                        <li>
                            <a target="_blank" href="/documents/Крым_молодёжный_Положение.pdf" class="px-1 2xl:px-4">Положение</a>
                        </li>
                    </ul>
                </nav>
                @auth
                    <div
                        class="min-h-[30px] w-fit xl:w-min text-center 2xl:w-fit px-5 flex justify-center items-center rounded-full bg-azure ml-auto xl:ml-0 font-commissioner-300 sm:font-commissioner-400 text-white text-xs/[120%] sm:text-sm lg:text-base/[120%] user-block">
                        {{ auth()->user()->first_name . " " . auth()->user()->last_name }}
                        <ul class="user-nav">
                            <li class="user-nav__item">
                                <a class="user-nav__link" href="{{ route('profile')  }}">Профиль</a>
                            </li>
                            <li class="user-nav__item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="user-nav__link">Выйти</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
                @guest
                    <a href="{{ route('socailite.redirect','vkontakte') }}"
                        class="min-h-[50px] min-w-[50px] flex justify-center items-center rounded-full bg-azure ml-auto xl:ml-0">
                        <img src="/images/icons/vk.svg" alt="vk">
                    </a>
                @endguest
                <div class="burger ml-2  flex xl:hidden">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </div>

        <div class="popup z-20 bg-white" id="popup-menu">
            <div class="container">
                <ul
                    class="text-base font-commissioner-300 py-10 flex flex-col justify-center items-center gap-4 md:gap-6 h-[calc(100vh - 92px)] text-primary">
                    <li>
                        <a href="#etapy" class="text-2xl md:text-[44px]">Этапы проведения</a>
                    </li>
                    <li>
                        <a href="#nominacii" class="text-2xl md:text-[44px]">Номинации</a>
                    </li>
                    <li>
                        <a target="_blank" href="/documents/Крым_молодёжный_Положение.pdf" class="text-2xl md:text-[44px]">Положение</a>
                    </li>
                </ul>
            </div>

        </div>
    </header>

    <main class="mb-24 lg:mb-[200px]">
        <section class="bg-no-repeat bg-right pt-10 md:pt-20 pb-24 lg:pb-[200px]"
            style="background-image:url('{{ asset('images/icons/front-block.svg')}}')">
            <div class="container">
                <div class="flex items-center justify-between flex-wrap relative pb-80 sm:pb-80 md:pb-[370px] 2xl:pb-0">
                    <div>
                        <h1
                            class="text-3xl xs:text-5xl sm:text-6xl md:text-7xl lg:text-title max-w-[680px] py-2 mb-5 sm:mb-8 lg:mb-[100px] font-commissioner-700 uppercase tracking-tighter">крым молодёжный это&nbsp;–
                        </h1>
                        <p class="text-[21px]/[calc(24/21*100%)] max-w-[568px]">
                            Республиканская премия общественного признания в&nbsp;2025&nbsp;году, направленная на выявление
                            и признание заслуг
                            крымской
                            молодёжи, имеющей особые достижения в различных областях социальной, экономической, научной,
                            инновационной, творческой,
                            спортивной, общественной и добровольческой деятельности.
                        </p>
                    </div>
                    <div class="absolute right-0 bottom-0 xs:pr-[30px]">
                        <div
                            class="bg-accent p-5 text-xl/[1] xs:text-xl max-w-full left-0 top-[-140px] xs:max-w-[300px] rounded-[20px] xs:left-auto xs:right-0 xs:top-[-156px] md:right-auto md:py-[30px] md:pl-7 md:pr-12 md:max-w-[380px] md:rounded-[26px] md:text-[28px]/[calc(32/28*100%)] text-primary font-commissioner-700 absolute z-[1] md:-top-40 md:left-[-62px]">
                            Самые яркие представители молодёжи полуострова
                        </div>
                        <div
                            class="text-black p-5 text-lg/[1] max-w-full xs:max-w-[240px] rounded-[20px] left-0 -top-16 md:text-xl/[calc(20.5/20*100%)] md:py-6 md:pl-7 md:pr-10 md:rounded-[26px] md:max-w-[260px] bg-soft-blue font-commissioner-300 absolute md:top-1 md:left-[-208px]">
                            Главное событие в сфере молодёжной политики Крыма
                        </div>
                        <div
                            class="bg-primary-light p-8 pl-9 text-xl/[1] xs:text-2xl rounded-[20px] md:text-[28px]/[calc(32/28*100%)] md:py-10 md:pl-16 md:pr-12 md:rounded-[30px] md:max-w-[468px] font-commissioner-700">
                            Общественное признание достижений молодых крымчан на региональном уровне
                        </div>
                        <div
                            class="bg-white rounded-[18px] pl-7 py-[17px] pr-10 text-primary font-commissioner-300 text-xl/[calc(20.5/20*100%)] max-w-[190px] absolute right-0 bottom-[-52px]">
                            {{ $categories->count() }} номинаций
                        </div>
                    </div>
                </div>
            </div>
            <div id="etapy"></div>
        </section>
        <div class="bg-white rounded-[60px] py-16 lg:py-[120px] mb-12 xs:mb-24 lg:mb-[200px]">
            <section class="pb-12 xs:pb-28 lg:pb-60 text-black relative">
                <div class="container">
                    <h2
                        class="_title text-primary mb-14 lg:mb-[110px] text-3xl xs:text-4xl lg:text-5xl 2xl:text-6xl/[1]">
                        Этапы проведения Премии в 2025 году
                    </h2>
                </div>
                <div class="relative hidden lg:block">
                    <div class="container">
                        <div class="grid grid-cols-4 relative z-[1]">
                            <div class="col-span-2 flex bottom-[-2px] relative">
                                <div class="ml-auto relative">
                                    <img src="/images/icons/point-top.svg" alt="">
                                    <div class="bg-primary bottom-[17px] right-[17px] pulse"></div>
                                </div>
                                <div class="max-w-[300px]">
                                    <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">1 июня - 11 июня</p>
                                    <p class="font-commissioner-700 text-xl/[calc(20.5/20*100%)]">
                                        Рассмотрение заявок экспертным советом
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-2 flex bottom-[-2px] relative">
                                <div class="ml-auto relative">
                                    <img src="/images/icons/point-top.svg" alt="">
                                    <div class="bg-primary bottom-[17px] right-[17px] pulse"></div>
                                </div>
                                <div class="max-w-[300px]">
                                    <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">27 июня</p>
                                    <p class="font-commissioner-700 text-xl/[calc(20.5/20*100%)]">
                                        Торжественное награждение победителей
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-2 flex top-[-49px] relative">
                                <div class="relative">
                                    <img src="/images/icons/point-bottom.svg" alt="">
                                    <div class="bg-accent-dark top-[17px] left-[17px] pulse"></div>
                                </div>
                                <div class="max-w-[300px] mt-auto absolute left-[50px] top-[100px]">
                                    <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">20 мая - 1 июня</p>
                                    <p class="font-commissioner-700 text-xl/[calc(20.5/20*100%)]">
                                        Заявочная компания
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-2 flex top-[-49px] relative">
                                <div class="relative">
                                    <img src="/images/icons/point-bottom.svg" alt="">
                                    <div class="bg-accent-dark top-[17px] left-[17px] pulse"></div>
                                </div>
                                <div class="max-w-[300px] mt-auto absolute left-[50px] top-[100px]">
                                    <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">12 июня - 22 июня</p>
                                    <p class="font-commissioner-700 text-xl/[calc(20.5/20*100%)]">
                                        Проведение народного голосования
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute top-[41%] h-[2px] bg-gray w-screen"></div>
                </div>
                <div class="container block relative lg:hidden">
                    <div class="absolute bg-gray w-[2px] h-full left-[24%] md:left-[24.75%]"></div>
                    <div class="ml-[25%] pl-2.5 pt-10">
                        <div class="relative mt-12 xs:mt-16">
                            <div class="absolute bottom-4 -rotate-90 translate-x-1 inline-block">
                                <img class="h-[144px]" src="/images/icons/point-bottom.svg" alt="">
                                <div class="bg-accent-dark pulse top-[17px] left-[17px]"></div>
                            </div>
                            <div class="max-w-[300px] relative bottom-4">
                                <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">20 мая - 1 июня</p>
                                <p class="font-commissioner-700 text-base/[1] tex xs:text-xl/[calc(20.5/20*100%)]">
                                    Заявочная компания
                                </p>
                            </div>
                        </div>
                        <div class="relative mt-16">
                            <div class="absolute bottom-4 rotate-90 translate-x-1 inline-block">
                                <img class="h-[144px]" src="/images/icons/point-top.svg" alt="">
                                <div class="bg-primary pulse bottom-[17px] left-[17px]"></div>
                            </div>
                            <div class="max-w-[300px] relative bottom-2 xs:static">
                                <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">1 июня - 11 июня</p>
                                <p class="font-commissioner-700 text-base/[1] xs:text-xl/[calc(20.5/20*100%)]">
                                    Рассмотрение заявок экспертным советом
                                </p>
                            </div>
                        </div>
                        <div class="relative mt-16">
                            <div class="absolute bottom-4 -rotate-90 translate-x-1 inline-block">
                                <img class="h-[144px]" src="/images/icons/point-bottom.svg" alt="">
                                <div class="bg-accent-dark pulse top-[17px] left-[17px]"></div>
                            </div>
                            <div class="max-w-[300px] relative bottom-2 xs:static">
                                <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">12 июня - 22 июня</p>
                                <p class="font-commissioner-700 text-base/[1] xs:text-xl/[calc(20.5/20*100%)]">
                                    Проведение народного голосования
                                </p>
                            </div>
                        </div>
                        <div class="relative mt-16">
                            <div class="absolute bottom-4 rotate-90 translate-x-1 inline-block">
                                <img class="h-[144px]" src="/images/icons/point-top.svg" alt="">
                                <div class="bg-primary pulse bottom-[17px] left-[17px]"></div>
                            </div>
                            <div class="max-w-[300px] relative bottom-2 xs:static">
                                <p class="mb-2 font-commissioner-300 text-base/[calc(19/16*100%)]">27 июня</p>
                                <p class="font-commissioner-700 text-base/[1] xs:text-xl/[calc(20.5/20*100%)]">
                                    Торжественное награждение победителей
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div id="nominacii"></div>
                <div class="container">
                    <h2
                        class="_title text-primary mb-10 lg:mb-[110px] text-3xl xs:text-4xl lg:text-5xl 2xl:text-6xl/[1]">
                        народное голосование
                    </h2>
                </div>
            </section>
            @foreach ($category_directions as $direction)
                <section class="mb-16 lg:mb-[120px]">
                    <div id="nominacii"></div>
                    <div class="container">
                        <div>
                            <h3 class="_title text-accent mb-5 lg:mb-10 text-2xl lg:text-[38px]/[calc(40/38*100%)]">
                                Направление <span class="text-primary"><span class="align-text-top">«</span>{{ $direction->title }}<span class="align-text-top">»</span></span>
                            </h3>
                            <div class="grid md:grid-cols-2 2xl:grid-cols-3 gap-4 text-white">
                                @foreach ($direction->categories as $category)
                                    @if($category->type_of->value == 'standart')
                                        <x-category.standart.list-item :category="$category" />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
    </main>
    <footer class="border-t border-t-white-transparent pt-9 pb-[35px]">
        <div class="container">
            <div class="flex justify-between flex-wrap gap-2.5">
                @isset( $setting['organization'] )
                    <p>
                        Организаторы: {{ $setting['organization'] }}
                    </p>
                @endisset
                <div class="flex justify-between flex-wrap gap-2.5">
                    @isset( $setting['address'] )
                        <p class="mr-[70px]">
                            {{ $setting['address'] }}
                        </p>
                    @endisset
                    @isset( $setting['email'] )
                        <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a>
                    @endisset
                </div>
            </div>
        </div>
    </footer>
    @vite(['resources/js/app.js'])
</body>

</html>