<script>
    function getBoothProfile(Exhibitor_ID) {
            $('.multiListMenu').hide();

            $('#innerContent').html('<br><br><br><br><center>loading...</center>');
            $.ajax({
                type: 'GET',
                url: "https://api.map-dynamics.com/embed/exhibitor-profile/inc.profile.php",
                data: "ID=" + Exhibitor_ID,
                success: function (data) {
                    $('#innerContent').html(data);
                }
            });
            $('#innerBox').show();
        }
        function handleBoothRegistration(Booth, Map_ID) {
            $('.multiListMenu').hide();
            $.ajax({
                type: 'POST',
                url: 'https://shows.map-dynamics.com/action.check-booth.php',
                data: 'Booth=' + Booth + '&Map_ID=' + Map_ID,
                success: function (response) {
                    if (response == "free") {
                        parent.frames['sidebar'].location.href = "https://checkout.map-dynamics.com/v3/sidebar.checkout.php?Booth=" + Booth + "&Map_ID=" + Map_ID;
                    } else {
                        if (prompt('This booth is reserved.  Please enter the reservation code.') == response) {
                            parent.frames['sidebar'].location.href = "https://checkout.map-dynamics.com/v3/sidebar.checkout.php?Booth=" + Booth + "&Map_ID=" + Map_ID;
                        } else {
                            window.alert('Sorry.  That code is invalid');
                        }
                    }
                }
            });
        }
        function fullScreenWindow() {
            var url = 'https://www.map-dynamics.com/halal2020?register';
            window.open(url, "", "location=no, menubar=no, scrolling=yes, status=no, titlebar=no, toolbar=no, top=0, left=0, height=" + window.screen.height + ",width=" + window.screen.width);
        }
        function loadShow(Show_ID, Map_ID, Headers) {
            $.ajax({
                type: 'POST',
                url: 'action.get-show-folder.php',
                data: 'Show_ID=' + Show_ID + '&Map_ID=' + Map_ID,
                success: function (data) {
                    parent.document.location.href = './' + data + '?register&' + Headers;
                }
            });
        }
</script>

<div id='topBar' class='no-print' style='background:#000000;'>
        <div id='innerLeft'><span>I Heart Halal 2020</span>
        </div>
        <div id='docsButton' class='button1 gradient-blue' style='background-color:#000000;height:42px;'>
            <div class='icons listIcon layers3-white'>Documents & Links</div>
        </div>
    </div>






    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="iso-8859-1">
    <title>framework</title>

    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/foundation.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/admin-framework.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/icons/icons.css">
    <link rel="stylesheet"
        href="<?php echo base_url()?>/css/framework-v2.css">
    <link rel="stylesheet"
        href="<?php echo base_url()?>/css/map-styles-v2.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/gloss.css">

    <script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery.foundation.tabs.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery.foundation.accordion.js"></script>
    <script src="<?php echo base_url()?>/assets/js/modernizr.foundation.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery.swfobject.min.js"></script>
    <script src="<?php echo base_url()?>/assets/js/inc.functions-framework_v4.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery-ui.js"></script>

    <style>
        .tabs.contained .active {
            border-top: 3px solid #000000;
        }

        #contentSpeakers,
        #contentSchedule {
            height: 100%;
            overflow-y: scroll;
        }
    </style>
</head>

<body style="margin:0px;padding:0px;background:#E7E7E7 url('images/texture-diamond.png') repeat scroll 0% 0%">

    <!-- EXHIBITOR/SCHEDULE/SPEAKER PROFILE POP-UP -->
    <div id='innerBox'>
        <div id='innerContent'></div>
    </div>

    <script>
        var User_Type = 0;
        var Show_ID = 4401;

        function switchContent(content) {

            $(".contentBlock").hide();
            $(".tab").removeClass('active');


            $('#tabSchedule span').removeClass('todo-list-gray');
            $('#tabFloorplan span').removeClass('up4-gray');
            $('#tabSpeakers span').removeClass('group-gray');

            $('#tabSchedule span').addClass('todo-list-white');
            $('#tabFloorplan span').addClass('up4-white');
            $('#tabSpeakers span').addClass('group-white');


            switch (content) {
                case "schedule":
                    $("#contentSchedule").show();
                    $('#tabSchedule').addClass('active');
                    $('#tabSchedule span').removeClass('todo-list-white');
                    $('#tabSchedule span').addClass('todo-list-gray');
                    break;
                case "floorplan":
                    $("#contentFloorplan").show();
                    $('#tabFloorplan').addClass('active');
                    $('#tabFloorplan span').removeClass('up4-white');
                    $('#tabFloorplan span').addClass('up4-gray');
                    break;
                case "speakers":
                    $("#contentSpeakers").show();
                    $('#tabSpeakers').addClass('active');
                    $('#tabSpeakers span').removeClass('group-white');
                    $('#tabSpeakers span').addClass('group-gray');
                    break;
                case "planner":
                    $("#contentPlanner").show();
                    $('#tabPlanner').addClass('active');
                    break;
            }
        }

        function handleMapElement(eName, Map_ID) {
            parent.frames[1].location.href = "editbar/?element=" + eName + "&Map_ID=" + Map_ID;
        }
        function getBoothProfile(Exhibitor_ID) {
            $('.multiListMenu').hide();

            $('#innerContent').html('<br><br><br><br><center>loading...</center>');
            $.ajax({
                type: 'GET',
                url: "https://api.map-dynamics.com/embed/exhibitor-profile/inc.profile.php",
                data: "ID=" + Exhibitor_ID,
                success: function (data) {
                    $('#innerContent').html(data);
                }
            });
            $('#innerBox').show();
        }
        function handleBoothRegistration(Booth, Map_ID) {
            $('.multiListMenu').hide();
            $.ajax({
                type: 'POST',
                url: 'https://shows.map-dynamics.com/action.check-booth.php',
                data: 'Booth=' + Booth + '&Map_ID=' + Map_ID,
                success: function (response) {
                    if (response == "free") {
                        parent.frames['sidebar'].location.href = "https://checkout.map-dynamics.com/v3/sidebar.checkout.php?Booth=" + Booth + "&Map_ID=" + Map_ID;
                    } else {
                        if (prompt('This booth is reserved.  Please enter the reservation code.') == response) {
                            parent.frames['sidebar'].location.href = "https://checkout.map-dynamics.com/v3/sidebar.checkout.php?Booth=" + Booth + "&Map_ID=" + Map_ID;
                        } else {
                            window.alert('Sorry.  That code is invalid');
                        }
                    }
                }
            });
        }
        function fullScreenWindow() {
            var url = 'https://www.map-dynamics.com/halal2020?register';
            window.open(url, "", "location=no, menubar=no, scrolling=yes, status=no, titlebar=no, toolbar=no, top=0, left=0, height=" + window.screen.height + ",width=" + window.screen.width);
        }
        function loadShow(Show_ID, Map_ID, Headers) {
            $.ajax({
                type: 'POST',
                url: 'action.get-show-folder.php',
                data: 'Show_ID=' + Show_ID + '&Map_ID=' + Map_ID,
                success: function (data) {
                    parent.document.location.href = './' + data + '?register&' + Headers;
                }
            });
        }
    </script>

    <div id='topBar' class='no-print' style='background:#000000;'>
        <div id='innerLeft'><span>I Heart Halal 2020</span>
        </div>
        <div id='docsButton' class='button1 gradient-blue' style='background-color:#000000;height:42px;'>
            <div class='icons listIcon layers3-white'>Documents & Links</div>
        </div>
    </div>
    <div class='contentBlock' id='contentFloorplan' style='display:block;'>
        <style>
            #darkOuterBox {
                position: absolute;
                z-index: 1000000;
                display: block;
                height: 100%;
                width: 100%;
                background: rgba(0, 0, 0, .4);
                top: 0px;
                display: none;
            }

            #lightInnerBox {
                display: block;
                width: 650px;
                min-height: 260px;
                background: #FFFFFF;
                border-radius: 8px;
                box-shadow: 0px 0px 6px rgba(0, 0, 0, .3);
                border: 1px solid rgba(0, 0, 0, .6);
                padding: 2px !important;
                top: 150px;
                position: absolute;
            }

            #lightInnerBox table {
                margin-bottom: 0px !important;
            }

            #lightInnerBox .button.medium {
                font-size: 16px;
                width: 100%;
            }

            #lightInnerBox .button.small {
                font-size: 14px;
                float: right;
            }

            .legend {
                padding: 6px !important;
            }

            .colorTable {
                width: 100%;
                margin: 6px 0px;
                padding: 0px;
                border: 0px;
                background: none;
            }

            .colorTable td {
                padding: 0px !important;
                color: #999999;
                font-weight: normal;
            }

            .colorBlock {
                width: 20px;
                height: 20px;
                display: block;
                float: left;
                margin-right: 6px;
            }

            .colorBlock.unoccupied {
                opacity: .5;
                filter: alpha(opacity=50);
            }

            /*BOOTH NUMBERS*/
            .bn {
                position: absolute;
                right: 5px;
                font-size: 12px;
                padding-left: 4px;
                background: #FFFFFF;
            }
        </style>

        <script>
            $(document).ready(function () {
                adjustPopupSize();
                $('#darkOuterBox').show('fast');

                $(window).resize(function () { adjustPopupSize(); });

                $('.ex').each(function () {
                    $(this).mouseover(function () { highlightBooth($(this).attr("Elements")); });
                    $(this).mouseout(function () { unhighlightBooth($(this).attr("Elements")); });
                });
            });

            function adjustPopupSize() {
                var w = $(window).width();
                w = w / 2 - 250;
                $('#lightInnerBox').css('left', w + "px");
            }

            function continueToRegistration() {
                $('#darkOuterBox').hide();
            }

        </script>
        <script>
            function checkUserType(Type_ID, bypass) {
                if (bypass) {
                    var Code = "";
                } else {
                    var Code = $('#code' + Type_ID).val();
                }

                $.ajax({
                    type: 'POST',
                    url: "action.verify-user-type.php",
                    data: "Show_ID=" + Show_ID + "&User_Type_ID=" + Type_ID + "&Code=" + Code,
                    success: function (data) {
                        if (data == "success") {
                            //location.reload();
                            var url = window.location.href;
                            url += '&nomenu=1'
                            window.location.href = url;

                            //                  $('#darkOuterBox').hide();
                        }
                    }
                });
            }

            function toggleType(typeID) {
                $('.codeBox').hide();
                $('#type' + typeID).slideDown();
            }



        </script>

        <style>
            .codeBox {
                display: none;
            }
        </style>

    </div>
    <style>
        /*
        9/5/2019
        Remove "display: table / table-cell" from .element and .element.div
        Don't understand why it caused issues in the new Chrome but it did.
    */

        #mapBox {
            margin: 30px;
            -moz-transform-origin: 0 0;
            position: relative;
            background-position: 0 0;
        }

        .element {
            overflow: none;
            z-index: 3;
            position: absolute;
            text-decoration: none;
            text-wrap: suppress;
            border-collapse: collapse;
            border: 1px solid #666666;
            background: #E2E2D5;
            -webkit-box-sizing: initial !important;
            -moz-box-sizing: initial !important;
            box-sizing: initial !important;
        }

        .loader {
            display: table;
            overflow: none;
            z-index: 3;
            position: absolute;
            text-decoration: none;
            text-wrap: suppress;
            border-collapse: collapse;
            -webkit-box-sizing: initial !important;
            -moz-box-sizing: initial !important;
            box-sizing: initial !important;
        }

        .table {
            border-radius: 50px;
            border-collapse: inherit !important;
        }

        .element:hover,
        .highlight {
            background: #F6D82B !important;
            z-index: 2000000 !important;
        }

        .element div {
            pointer-events: none;
            position: relative;
            height: 100%;
        }

        .element .bLabel {
            display: block !important;
            position: absolute;
            /*width: 100px;*/
            /*left: 50%;
        margin-left: -50px;*/
            width: 100% !important;
            pointer-events: none;
            border-collapse: collapse;
            overflow: visible !important;
            -moz-box-sizing: initial !important;
            box-sizing: initial !important;
        }

        .element .blt {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            width: 100%;
            font-family: arial;
            color: #000000 !important;
            text-align: center !important;
        }

        .open {
            z-index: 1;
            opacity: .7;
            filter: alpha(opacity=70);
        }

        .closed {
            box-shadow: 2px 2px 2px rgba(0, 0, 0, .2);
            border: 1px solid #222222;
        }

        .sideMenu {
            position: absolute;
            height: 100%;
            right: 0px;
            top: 0px;
            width: 90px;
            background: rgba(0, 0, 0, .15);
            border-left: 1px solid rgba(255, 255, 255, .8);
            z-index: 20;
        }

        .zoomButton {
            border: 3px solid rgb(255, 255, 255);
            border-radius: 40px;
            font-size: 52px;
            font-weight: bold;
            color: rgb(255, 255, 255);
            box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            width: 60px;
            height: 60px;
            cursor: pointer;
            font-family: arial;
        }

        /* POP UP MENU STYLES */
        .popUpMenu,
        .multiListMenu {
            display: none;
            position: absolute;
            top: 0px;
            left: 0px;
            min-width: 250px;
            max-width: 350px;
            z-index: 10000000;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, .2);
        }

        .popUpMenu .menuLeftArrow {
            display: block;
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-right: 20px solid rgba(0, 0, 0, .8);
            position: absolute;
            left: -30px;
            top: 0px;
            border-bottom: 10px solid transparent;
            border-left: 10px solid transparent;
        }

        .popUpMenu .tL,
        .multiListMenu .tL {
            background: rgba(0, 0, 0, .8);
            font-family: arial;
            color: #FFFFFF;
            padding: 4px;
            font-size: 12px;
            font-weight: bold;
            border-top-right-radius: 4px;
        }

        .multiListMenu .tL {
            border-top-left-radius: 4px;
            padding: 8px;
            font-size: 10px;
            border-bottom: 2px solid rgba(255, 255, 255, .8);
        }

        .popUpMenu .bL,
        .multiListMenu .bL {
            background: #FFFFFF;
            font-family: arial;
            color: #666666;
            font-size: 10px;
            padding: 6px 6px 6px 8px;
            border: 1px solid rgba(0, 0, 0, .8);
        }

        .popUpMenu .items,
        .multiListMenu .items {
            list-style-type: none;
            padding: 0px;
            margin: 0px;
        }

        .popUpMenu .items li,
        .multiListMenu .items li {
            cursor: pointer;
            margin-top: 0px;
            padding: 6px;
            background: #464646;
            border-bottom: 1px solid rgba(255, 255, 255, .7);
            margin-left: 0px;
            color: #FFFFFF;
            font-family: arial;
            font-size: 12px;
        }

        .popUpMenu .items li:last-child,
        .multiListMenu .items li:last-child {
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .multiListMenu .items li:hover {
            background: rgba(255, 255, 255, .9);
            color: #000000;
        }

        .redx {
            background: url(https://shows.map-dynamics.com/images/red-x.png) no-repeat;
            background-size: 100% 100% !important;
        }

        .rotated {
            -webkit-transform-origin: top left;
            -moz-transform-origin: top left;
            -ms-transform-origin: top left;
            -o-transform-origin: top left;
            transform-origin: top left;
        }

        .topImage {
            display: none;
            position: absolute;
            top: 0px;
            border: 1px solid rgba(0, 0, 0, .6);
            background: #FFFFFF;
            border-radius: 4px;
            padding: 5px;
        }

        .topImage img {
            width: 240px;
        }

        .upBold {
            font-weight: bold;
            text-transform: uppercase
        }

        .boothArrow {
            width: 53px !important;
            height: 61px !important;
            position: absolute;
            top: -65px;
            z-index: 30000;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
        }
    </style>

    <script>

        var eLeft = 0;
        var eTop = 0;
        var eWidth = 0;
        var menuTimeout;

        //ALIAS FUNCTION
        function gbp(ID) {
            getBoothProfile(ID);
        }

        function showMenu(Element_ID) {
            $('.popUpMenu').hide();

            eLeft = parseFloat($("#" + Element_ID).css("left"));
            eWidth = parseFloat($("#" + Element_ID).css("width"));
            wHeight = $(window).height();

            eTop = $("#" + Element_ID).css("top");

            $('#menu' + Element_ID).css("left", (eLeft + eWidth + 30) + "px");
            $('#menu' + Element_ID).css("top", eTop);
            $('#menu' + Element_ID).show();

            if ((parseInt(wHeight) - parseInt(eTop)) < 300) {
                $('#topImage' + Element_ID).css('top', -parseInt($('#topImage' + Element_ID).css('height')) + "px");
                $('#topImage' + Element_ID).css('display', 'block');
                $('#bottomImage' + Element_ID).css('display', 'none');
            } else {
                $('#topImage' + Element_ID).css('display', 'none');
                $('#bottomImage' + Element_ID).css('display', 'block');
            }
        }



        function showLoaderMenu(Element_ID, rotated) {
            $('.popUpMenu').hide();

            eLeft = parseFloat($("#" + Element_ID).css("left"));
            eWidth = parseFloat($("#" + Element_ID).css("width"));
            eHeight = parseFloat($("#" + Element_ID).css("height"));
            eTop = parseFloat($("#" + Element_ID).css("top"));

            if (rotated == 1) {
                $('#menu' + Element_ID).css("left", ((eLeft - (eWidth / 2)) + 30) + "px");
            } else {
                $('#menu' + Element_ID).css("left", ((eLeft + (eWidth / 2)) + 40) + "px");
            }
            $('#menu' + Element_ID).css("top", (eTop + (eHeight / 2)) + "px");
            $('#menu' + Element_ID).show();
        }

        function showMultiMenu(Element_ID) {
            $('.popUpMenu').hide();
            $('.multiListMenu').hide();

            eLeft = parseFloat($("#" + Element_ID).css("left"));
            eWidth = parseFloat($("#" + Element_ID).css("width"));
            eTop = $("#" + Element_ID).css("top");

            $('#multiMenu' + Element_ID).css("left", (eLeft + eWidth + 30) + "px");
            $('#multiMenu' + Element_ID).css("top", eTop);
            $('#multiMenu' + Element_ID).show();

            clearTimeout(menuTimeout);
            menuTimeout = setTimeout(function () { $('.multiListMenu').hide(); }, 2000);
        }

        function hideMenu() {
            $('.popUpMenu').hide();
        }

    </script>

    <style>
        #mapBox .element div div {
            font-size: 6px;
        }
    </style>
    <div id='boundingBox'
        style='position:relative;border:1px solid #999999;display:block;overflow:hidden;margin-top:15px;'>
        <div class='sideMenu'>
            <br><br><br>
            <center style='font-size:16px;font-weight:bold;'>
                <div onClick="zoomUp()" class='zoomButton'>+</div>
                Zoom In<br><br><br>
                <div onClick="zoomOut()" class='zoomButton'>-</div>
                Zoom Out
            </center>
        </div>
        <div id='mapBox'
            style='height:845.73px;width:594.41px;border:1px solid #999999;z-index:10;margin:auto auto;border-radius:15px;background:url(./floor-plan.jpg?timestamp=1583439520);background-position: center top;background-size: 100% auto;'>
            <?php foreach ($data as $key => $value) {?>
                <a href="javascript:gbp(815672);" ID='a<?php echo $value['ID']?>' class='element booth rotated closed type26642'
                style='-ms-transform: rotate(0deg);transform: rotate(0deg);background:#f2ff00;left:<?php echo $value['Left']?>%;top:<?php echo $value['Top']?>%;width:3.65%;height:2.75%;z-index:46564'>
                <div class='bLabel' style='-ms-transform: rotate(0deg);transform: rotate(0deg);'>
                    <center>
                        <p class='blt' SF='6' style='font-size:6px;color:#000000 !important;'><?php echo $value['No']?></p>
                    </center>
                </div>
            </a>
            <div class='popUpMenu' id='menua<?php echo $value['ID']?>'>
                <div class='menuLeftArrow'></div>
                <div class='tL'>Booth <?php echo $value['No']?></div>
                <div class='bL'>Dimensions 10 x 10</div>
            </div>
            <?php } ?>
            
            <div style='clear:both;'></div>
        </div>
    </div>

    <script>

        var Map_Height = 459.95;
        var Map_Width = 1272;

        var MapBox_Width = 0;
        var MapBox_Height = 0;
        var MapBox_Left = 0;
        var MapBox_Top = 0;
        var MapBox_Font_Size = 0;

        var Bounding_Box_Width = 0;
        var Bounding_Box_Height = 0;

        var Bounding_Box_Target = 0;
        var MapBox_Target = 0;

        $(function () {
            $("#mapBox").draggable();

            //SET THE INITIAL VALUES
            MapBox_Width = $('#mapBox').outerWidth();
            MapBox_Height = $('#mapBox').outerHeight();
            MapBox_Font_Size = parseFloat($('.element div div').css("font-size"));

            $('.element').each(function () {
                $(this).mouseout(function () { hideMenu(); });
                $(this).mouseover(function () { showMenu($(this).attr("ID")); });
            });

            initHTMLMap();
        });

        var Font_Size = 6;
        var currentZoom = 1;
        var zoomInHelper = 0;
        var zoomOutHelper = 0;

        if (/edge/.test(navigator.userAgent.toLowerCase())) {
            //NO CHANGES
        } else if (/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())) {
            zoomInHelper = 1;
            zoomOutHelper = 2;
        }

        $(window).resize(function () {
            initHTMLMap();
        });

        function initHTMLMap() {
            //SET VIEWABLE SPACE
            $('#boundingBox').css("width", $(window).width() + "px");
            $('#boundingBox').css("height", ($(window).height() - 50) + "px");

            resetMap();
        }


        function highlightBooth(booths) {
            $('.multiListMenu').hide();
            booths = booths.split(",");
            for (i = 0; i < booths.length; i++) {
                $('#' + booths[i]).addClass("highlight");
                $('#' + booths[i]).prepend("<img class='boothArrow' src='images/down-arrow.png'>");
            }
        }

        function unhighlightBooth(booths) {
            $('.multiListMenu').hide();
            $('.boothArrow').remove();
            booths = booths.split(",");
            for (i = 0; i < booths.length; i++) {
                $('#' + booths[i]).removeClass("highlight");
            }
        }

        function highlightBoothTypes(Type) {
            $('.multiListMenu').hide();
            $('.type' + Type).addClass('highlight');
        }

        function resetMapButtons() {
            $('.multiListMenu').hide();
            $('.element').removeClass('highlight');
        }


        function resetMap() {
            $('.multiListMenu').hide();

            //SET THE BOUNDING DIMENSIONS
            Bounding_Box_Height = $(window).height() - 70;

            if ($('#sideBarButton').hasClass('closed')) {
                Bounding_Box_Width = $(window).width() - 120;
                $('#mapBox').css('left', '-44px');
            } else {
                Bounding_Box_Width = $(window).width() - 330;
                $('#mapBox').css('left', '65px');
            }

            //DETERMINE WHICH BOUNDING/MAP DIMENSIONS TO TARGET
            if (Map_Width > Map_Height) {
                MapBox_Target = Map_Width;

                Bounding_Box_Target = Bounding_Box_Width;
            } else {
                MapBox_Target = Map_Height;
                Bounding_Box_Target = Bounding_Box_Height;
            }

            //DETERMINE RATIO, ESTABLISH A MINIMUM SIZE
            if (Bounding_Box_Target < 300) {
                Bounding_Box_Target = 300;
            } else {
                var amount = MapBox_Target / Bounding_Box_Target;
            }

            //UPDATE ALL THE DIMENSIONS
            $('#mapBox').outerWidth(MapBox_Width / amount);
            $('#mapBox').outerHeight(MapBox_Height / amount);

            $('.blt').each(function () {
                $(this).css("font-size", (parseFloat($(this).attr("SF")) / amount) + "px");
            });


            if (Bounding_Box_Target > 300) {
                if (Bounding_Box_Height < $('#mapBox').outerHeight()) {
                    var amount = $('#mapBox').outerHeight() / Bounding_Box_Height;

                    $('#mapBox').outerWidth($('#mapBox').outerWidth() / amount);
                    $('#mapBox').outerHeight($('#mapBox').outerHeight() / amount);

                    $('.blt').each(function () {
                        $(this).css("font-size", (parseFloat($(this).css("font-size")) / amount) + "px");
                    });

                } else if (Bounding_Box_Width < $('#mapBox').outerWidth()) {
                    var amount = $('#mapBox').outerWidth() / Bounding_Box_Width;

                    $('#mapBox').outerWidth($('#mapBox').outerWidth() / amount);
                    $('#mapBox').outerHeight($('#mapBox').outerHeight() / amount);

                    $('.blt').each(function () {
                        $(this).css("font-size", (parseFloat($(this).css("font-size")) / amount) + "px");
                    });
                }
            }


            $('#mapBox').css('top', (((Bounding_Box_Height / 2) - ($('#mapBox').outerHeight() / 2) + 16)) + "px");
        }


        function zoomUp() {
            $('.multiListMenu').hide();

            currentZoom += 1;

            $('#mapBox').outerWidth(($('#mapBox').outerWidth() + zoomInHelper) * 1.3);
            $('#mapBox').outerHeight(($('#mapBox').outerHeight() + zoomInHelper) * 1.3);
            $('.blt').each(function () {
                $(this).css("font-size", (parseFloat($(this).css("font-size")) * 1.3) + "px");
            });
        }

        function zoomOut() {
            $('.multiListMenu').hide();

            currentZoom -= 1;

            $('.blt').each(function () {
                $(this).css("font-size", (parseFloat($(this).css("font-size")) / 1.3) + "px");
            });
            $('#mapBox').outerWidth(($('#mapBox').outerWidth() / 1.3) + zoomOutHelper);
            $('#mapBox').outerHeight(($('#mapBox').outerHeight() / 1.3) + zoomOutHelper);
        }
    </script>
    </div>
    <div id='docsBlock' class='block1'>
        <a href="https://store.primeees.com/" target='_blank'>Order electric</a>
    </div>
    <div id='bottomBar' class='no-print' style='background:#000000;'>
        <div id='innerLeft'><a href='http://www.map-dynamics.com?c=footer'
                alt='Map Dynamics: Interactive Tradeshow Floorplans' target='_blank'>Powered by Map Dynamics</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:fullScreenWindow()">&nbsp;&nbsp;&nbsp;&nbsp;</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onMouseOver="EI_listElementOn()"
                onMouseOut="EI_listElementOff()">&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </div>
    </div>


    <a href='http://www.map-dynamics.com?c=footer' target='_blank' style='display:none;'>Trade Show Floor Plan
        Software</a>

    <script>
        $(document).foundationTabs();
        $(document).foundationAccordion();

        function adjustSidebar() {
            var newHeight = ($(window).height() - 163) + "px";
            $('#sidebar .content').height(newHeight);

            $('#sideBar').height(($(window).height() - 60) + "px");
            $('#sideBar .accordion').height(($(window).height() - 62) + "px");
        }

        function toggleSideBar(status) {
            switch (status) {
                case "open":
                    $('#sideBarButton').removeClass('closed');
                    $('#sideBar').show();
                    $('#sideBarButton').addClass('open');
                    break;

                case "close":
                    $('#sideBarButton').removeClass('open');
                    $('#sideBar').hide();
                    $('#sideBarButton').addClass('closed');
                    break;
            }
        }

    </script>

    <script>
        $(document).ready(function () {

            if ($(window).width() < 700) {
                /*toggleSideBar('close');*/
            }
            adjustSidebar();

            //SIDE BAR MENU TOGGLE
            $('#sideBarButton').click(function () {
                if ($(this).hasClass('open')) {
                    toggleSideBar('close');
                } else {
                    toggleSideBar('open');
                }
            });



            $('#mapsButton').click(function () {
                $('#mapsBlock').slideToggle();
            });
            $('#mapsBlock').click(function () {
                $('#mapsBlock').slideToggle();
            });
            $('#docsButton').click(function () {
                $('#docsBlock').slideToggle();
            });
            $('#docsBlock').click(function () {
                $('#docsBlock').slideToggle();
            });


            $(window).resize(function () {
                adjustSidebar();
            });

        });		  	
    </script>

</body>

</html>