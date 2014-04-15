<?php

$center['lat'] = 56.13809;
$center['lng'] = 40.408401;

$span['lat'] = 0.107896;
$span['lng'] = 0.343323;

if (!empty($_GET['ll'])) {
	list ($lat, $lon) = split(',', $_GET['ll']);
	if (is_numeric($lat) && is_numeric($lon)) {
		$center['lat'] = $lat;
		$center['lng'] = $lon;
	}
}

if (!empty($_GET['spn'])) {
	list ($lat, $lon) = split(',', $_GET['spn']);
	if (is_numeric($lat) && is_numeric($lon)) {
		$span['lat'] = $lat;
		$span['lng'] = $lon;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml" xmlns:v = "urn:schemas-microsoft-com:vml">
    <head>
        <meta http-equiv = "content-type" content = "text/html; charset=UTF-8"/>

        <noscript>
            <meta http-equiv = "refresh" content = "0; URL=<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/" . $_SERVER['REQUEST_URI']; ?>"/>
        </noscript>

        <title>Google Maps</title>

        <style type = "text/css">
            body
                {
                background-color: white;
                color: black;
                font-family: Arial, sans-serif;
                margin-top: 3px;
                margin-bottom: 0;
                }

            a:link
                {
                color: #0000cc;
                }

            a:visited
                {
                color: #551a8b;
                }

            a:active
                {
                color: red;
                }

            a.a
                {
                color: #008000;
                }

            a.fl
                {
                color: #7777cc;
                }

            a.q:visited
                {
                color: #0000cc;
                }

            table
                {
                border-collapse: collapse;
                }

            td
                {
                padding: 0;
                }

            img
                {
                border: 0;
                }

            form
                {
                padding: 0;
                margin: 0;
                }

            #gaia
                {
                font-size: small;
                }

            #search
                {
                margin-bottom: 1px;
                font-size: small;
                }

            #search .logo
                {
                padding-right: 7px;
                }

            #search .tabs
                {
                vertical-align: bottom;
                padding-bottom: 1px;
                padding-left:   4px;
                }

            #search .bxfm
                {
                z-index:  2;
                position: relative;
                padding:  2px 0px 1px 0px;
                }

            #search .box
                {
                vertical-align: top;
                }

            #search .box .form .input .pr
                {
                padding-left: 0.35em;
                }

            #search .box .form .labels .pr
                {
                padding-left: 0.45em;
                }

            #search .box .btn
                {
                padding: 0 .6em 0 .6em;
                width: auto;
                overflow: visible;
                }

            #search .box .form .labels td
                {
                padding-top: 1px;
                font-size: 85%;
                }

            #search .box .form .labels .example
                {
                color: gray;
                }

            #search .helplinks
                {
                vertical-align: top;
                white-space: nowrap;
                padding-left: 7px;
                }

            #search .helplinks .selected a
                {
                text-decoration: none;
                color: black;
                font-weight: bold;
                }

            #search .box .form .input .ipt
                {
                padding-bottom: 2px;
                border-bottom: 2px solid #ff9900;
                }

            #search td
                {
                padding-right: 2px;
                }

            #search .nopr
                {
                padding-left:  0.35em;
                padding-right: 0px;
                }

            #search .helplinks div
                {
                padding: 1px .75em 1px .75em;
                }

            #search .helplinks .selected
                {
                position: relative;
                top: -3px;
                z-index: 3;
                background-color: #ffeac0;
                font-weight: bold;
                border-width: 0px 2px 2px 2px;
                border-color: #ff9900;
                border-style: solid;
                }

            #search .helplinks .unselected
                {
                position: relative;
                top: -3px;
                z-index: 1;
                }

            #search .vbtn
                {
                padding-left:   0.35em;
                vertical-align: bottom;
                padding-bottom: 4px;
                }

            #titlebar
                {
                border-top:       1px solid #ff9900;
                background-color: #ffeac0;
                width:            100%;
                margin-bottom:    7px;
                }

            #titlebar .title
                {
                font-size:   large;
                font-weight: bold;
                padding-left: 3px;
                }

            #titlebar#stats
                {
                font-size:    small;
                padding-left: 10px;
                color:        #666666;
                }

            #titlebar#stats#timers
                {
                position: relative;
                overflow: auto;
                width:    100%;
                height:   50px;
                }

            #titlebar .links
                {
                font-size:  small;
                text-align: right;
                vertical-align: middle;
                padding-right: 3px;
                }

            #titlebar .links a
                {
                text-decoration: none;
                white-space: nowrap;
                padding-left: 0.75em;
                color:       #0000cc;
                }

            #titlebar .links a span
                {
                text-decoration: underline;
                }

            #titlebar .links a img
                {
                width:  16px;
                height: 16px;
                vertical-align: bottom;
                }

            @media screen, projection
                {
                #page
                    {
                    position: relative;
                    width: 100%;
                    }

                #panel
                    {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 20em;
                    overflow: auto;
                    }

                #panel:focus
                    {
                    -moz-outline:0px;
                    }

                #map
                    {
                    margin-left: 20.4em;
                    border: 1px solid #979797;
                    background-color: #e5e3df;
                    }
                }

            #map .loading
                {
                color:   gray;
                padding: 10px;
                }

            .query
                {
                font-size:      small;
                padding-bottom: 0.2em;
                padding-right:  0.2em;
                }

            .suggest
                {
                font-size: medium;
                }

            .suggest .ref
                {
                margin-top: 0.5em;
                }

            .suggest .didyou
                {
                color: #cc0000;
                }

            .dist
                {
                color: #7777cc;
                }

            .legal
                {
                padding:     0.2em;
                padding-top: 1em;
                font-size:   85%;
                color:       gray;
                }

            .legalattop
                {
                padding-bottom: 1em;
                font-size: 85%;
                color:     gray;
                }

            .sp
                {
                font-size:    small;
                padding-left: 1px;
                padding-top:  1px;
                padding-right: 4px;
                }

            .sp .title
                {
                font-size:   medium;
                font-weight: bold;
                }

            .sp .description
                {
                padding-bottom: 1em;
                }

            .sp .showing
                {
                margin-bottom: 0.75em;
                }

            .deb
                {
                font-size: x-small;
                }

            .deb a:link
                {
                color: red;
                }

            #vp
                {
                position: absolute;
                top: -10px;
                left: -10px;
                width: 1px;
                height: 1px;
                visibility: hidden;
                }

            #homestate
                {
                display: none;
                }

            .hp
                {
                margin-right: 0.2em;
                font-size: small;
                }

            .hp .promo
                {
                margin-bottom: 1em;
                }

            .hp .home
                {
                margin-bottom: 1em;
                }

            .hp .tinstruct
                {
                margin-bottom: 1em;
                }

            .hp .hdr
                {
                font-size:  medium;
                margin-top: 1em;
                margin-right: 0.2em;
                margin-bottom: 0.2em;
                font-weight: bold;
                }

            .hp .subhdr
                {
                padding-top:    0.5em;
                padding-bottom: 0.2em;
                font-weight:    bold;
                }

            .hp .eg
                {
                padding-right:  0.2em;
                padding-bottom: 0.2em;
                padding-left:   0.8em;
                margin-top:     1em;
                }

            .hp .tour
                {
                margin-top: 1em;
                }

            .hp .amsg
                {
                margin-top:    0.3em;
                margin-bottom: 0.2em;
                }

            .hp .feedback
                {
                margin-top: 1em;
                }

            .hp .lbc
                {
                font-size: small;
                }

            .dir
                {
                font-size:    small;
                padding-left: 1px;
                padding-top:  1px;
                padding-right: 4px;
                }

            .dir td
                {
                border:  1px solid silver;
                padding: 0.2em;
                vertical-align: top;
                }

            .dir .reverse
                {
                padding-top:    0.75em;
                padding-bottom: 0.5em;
                }

            .dir .num, .dir .name
                {
                white-space:      nowrap;
                background-color: #eeeeee;
                }

            .printsummary .name
                {
                font-size: 90%;
                }

            .dir .num
                {
                text-align: right;
                }

            .dir .desc, .dir .value
                {
                width: 100%;
                }

            .printsummary .value
                {
                font-weight: bold;
                }

            .printheadtable
                {
                margin-bottom: 0.3em;
                }

            .printheadtable td
                {
                padding-left:  0.2em;
                padding-right: 0.2em;
                vertical-align: top;
                }

            .dir .num, .dir .desc, .dir .milestone
                {
                cursor: pointer;
                }

            .dir td.gap
                {
                text-align:  center;
                border-left: none;
                border-right: none;
                padding:     0;
                }

            .dir div.gap
                {
                margin-top: -0.5em;
                }

            table.dirsegment, table.dircsi, table.dircsi_hidden
                {
                border:  none;
                padding: 0px;
                width:   100%;
                }

            table.dirsegment td, table.dircsi td, table.dircsi_hidden td
                {
                border:  none;
                padding: 0px;
                }

            .dircsi_hidden
                {
                display: none;
                }

            tr.csi { /* font-style: italic; */ }

            td.csi_interval, td.csi_segdist
                {
                text-align: right;
                width: 4.33em;
                overflow: visible;
                }

            td.csiopener, td.csicloser
                {
                width:             12px;
                background-repeat: no-repeat;
                }

            td.csiopener
                {
                background-image: url(/mapfiles/closedArrow.gif);
                }

            td.csicloser
                {
                background-image: url(/mapfiles/openArrow.gif);
                }

            .iw
                {
                font-size:     small;
                padding-right: 10px;
                }

            .iw .card
                {
                padding-top: 1.0em;
                display: none;
                }

            .iw .wizard
                {
                display: none;
                }

            .iw .label
                {
                color:       gray;
                padding-top: 0.1em;
                padding-bottom: 0.1em;
                font-size:   0.85em;
                text-align:  left;
                }

            .iw .top
                {
                margin-top: 0em;
                }

            .iw .title
                {
                font-size:   medium;
                font-weight: bold;
                margin-bottom: 0.0em;
                }

            .iw .wizard  .example
                {
                font-size: 85%;
                color: grey;
                padding-top: 0.2em;
                }

            .iw .sd
                {
                margin-top: 0.2em;
                }

            .iw .sd .lnk
                {
                font-size:   85%;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
                }

            .iw .sd a.lnkmore:link
                {
                color: #008000;
                }

            .iw .sd a.lnkmore, .iw .sd span.tab
                {
                white-space: nowrap;
                }

            .iw .sd .src
                {
                padding-top: 0.2em;
                }

            .iw .sd .src, .iw .sd .src a
                {
                color: #008000;
                }

            .unver
                {
                color:       #7777cc;
                white-space: nowrap;
                }

            .unver a:link
                {
                color: #7777cc;
                }

            .iw .pn
                {
                padding-top:    0.1em;
                padding-bottom: 0.0em;
                }

            .iw .ref
                {
                padding-bottom: 0.2em;
                }

            .iw .ref a:link
                {
                color: #008000;
                }

            .iw .rev
                {
                padding: 0;
                }

            .iw .rev a:link
                {
                color: #7777cc;
                }

            .iw .stp
                {
                padding-top:    0.1em;
                padding-bottom: 0.2em;
                }

            .iw .short_msg
                {
                color:     #222222;
                font-size: 110%;
                letter-spacing: 0.1ex;
                padding-bottom: 1em;
                }

            .iw .dir
                {
                padding-bottom: 2px;
                padding: 0;
                }

            .iw .dir .inpt
                {
                width: 13.45em;
                }

            .iw .attr
                {
                padding-top: 0.15em;
                width: 20em;
                }

            .iw .attr .name
                {
                font-weight: bold;
                }

            .iw .tab
                {
                text-decoration: underline;
                color: blue;
                cursor: pointer;
                }

            .iw span.selected
                {
                font-weight:     bold;
                text-decoration: none;
                color:           black;
                cursor:          default;
                }

            .iw div.selected
                {
                display: block;
                }

            .sloc
                {
                font-size:  small;
                margin-top: 0.5em;
                }

            #panel .local
                {
                font-size:      small;
                padding-bottom: 0.5em;
                }

            .cat
                {
                margin-bottom: 0.75em;
                padding-right: 7px;
                }

            .res
                {
                border-collapse: collapse;
                }

            #panel .res .selected, #panel .dir .selected
                {
                background-color: #eeeeee;
                }

            .res td
                {
                vertical-align: top;
                }

            .res .icon
                {
                cursor:      pointer;
                padding-top: 0.25em;
                padding-right: 2px;
                }

            .res .text
                {
                padding-left: 5px;
                padding-top: 0.25em;
                padding-bottom: 0.5em;
                padding-right: 7px;
                }

            .res .name
                {
                font-size:   medium;
                padding-top: 3px;
                }

            .res .web
                {
                margin-top: 0.5em;
                }

            .url
                {
                color: #008000;
                }

            .ads .geo
                {
                color: gray;
                }

            .ads .head
                {
                font-size: 90%;
                color: gray;
                }

            .ad
                {
                margin-bottom: 0.5em;
                margin-left: 0.3em;
                }

            .ad .title
                {
                font-size: medium;
                }

            .bottomads
                {
                background-color: #e5ecf9;
                margin-top: 0.25em;
                padding-bottom: 0.15em;
                }

            .topads
                {
                background-color: #e5ecf9;
                margin-bottom: 0.5em;
                padding-bottom: 0.15em;
                }

            .adsmessage
                {
                color:     gray;
                font-size: 90%;
                cursor:    default;
                }

            .geoads
                {
                margin-bottom:    0.5em;
                background-color: #e5ecf9;
                }

            .geoads .marker
                {
                vertical-align: top;
                cursor: pointer;
                padding-left: 2px;
                }

            .geoads .marker div
                {
                position: relative;
                }

            .geoads .marker .pushpin
                {
                width:  33px;
                height: 28px;
                z-index: 0;
                }

            .geoads .marker .label
                {
                position: absolute;
                top: 3px;
                left: 3px;
                width: 16px;
                height: 16px;
                z-index: 1;
                }

            .geoads .text
                {
                vertical-align: top;
                padding: 0.1em;
                width:   100%;
                cursor:  default;
                }

            .geoads .text .line1
                {
                font-size: medium;
                }

            .geoads .text .phone { }

            .geoads .text .visurl
                {
                color: #008000;
                }

            .geoads .text .addr
                {
                color: gray;
                }

            .iwgeoad
                {
                margin:    0px;
                font-size: small;
                }

            .iwgeoad .admsg
                {
                font-size: 90%;
                color: gray;
                }

            .iwgeoad .head
                {
                padding-right: 0.2em;
                }

            .iwgeoad .head .title
                {
                font-size:   medium;
                font-weight: bold;
                }

            .iwgeoad .detls { }

            .iwgeoad .detls .visurl
                {
                padding-top: 0em;
                color: #008000;
                }

            .iwgeoad .detls .addr
                {
                padding-top: 0.5em;
                color: gray;
                }

            .iwgeoad .image
                {
                vertical-align: top;
                padding-left: 0.5em;
                }

            .iwgeoad .image .bdr
                {
                border: 1px solid silver;
                }

            .iwgeoad .image img
                {
                border: 2px solid white;
                }

            .notices
                {
                margin-top: 1em;
                }

            #hm
                {
                position: absolute;
                z-index: 3;
                border:  1px solid black;
                background: white;
                padding: 0px;
                }

            .ac td
                {
                text-decoration: none;
                background: white;
                color:      black;
                display:    block;
                cursor:     default;
                padding:    1px 2px 1px 2px;
                font-size:  80%;
                white-space: nowrap;
                }

            .ac td.sel
                {
                background: #3366CC;
                color: white;
                padding: 1px 2px 1px 2px;
                }

            .acl
                {
                color:  #0000cc;
                cursor: pointer;
                white-space: nowrap;
                }

            .acdel
                {
                margin-top: 2px
                }

            div .n
                {
                margin-top: 1ex
                }

            .n a
                {
                font-size: 10pt;
                color: #000;
                }

            .n .i
                {
                font-size:   10pt;
                font-weight: bold;
                }

            .i, .i:link
                {
                color: #a90a08
                }

            .q:visited, .q:link, .q:active, .q
                {
                color: #00c
                }

            .b a
                {
                font-size: 12pt;
                color: #00c;
                font-weight: bold;
                }

            .nav
                {
                padding-left: 2em
                }

            .imgn
                {
                line-height: 1px
                }

            .wpt
                {
                margin-top:    1em;
                margin-bottom: 1em;
                font-size:     medium;
                }

            .errortips li
                {
                padding-bottom: 0.8em;
                font-size: small;
                }

            ul.errortips
                {
                padding-left: 1.25em;
                margin-left: 0;
                }

            #modifysearchheading
                {
                margin-bottom: 0.5em;
                font-size: medium;
                }

            #modifysearchmsg1
                {
                margin-bottom: 0.3em;
                }

            #modifysearchmsg2
                {
                margin-bottom: 0.4em;
                }

            @media screen, projection
                {
                .noscreen
                    {
                    display: none;
                    }

                html, body
                    {
                    overflow: hidden;
                    }

                #printmessage
                    {
                    display: none;
                    }
                }

            @media print
                {
                .noprint
                    {
                    display: none;
                    }

                .printimage
                    {
                    width:  100%;
                    border: 1px solid silver;
                    }

                #printmessage
                    {
                    display:  block;
                    position: absolute;
                    z-index:  100000;
                    top:      0mm;
                    right:    0mm;
                    width:    7cm;
                    padding:  1.5mm 2mm;
                    color:    black;
                    background-color: silver;
                    border:   1px solid black;
                    text-align: center;
                    font-size: 6pt;
                    font-family: sans-serif;
                    }

                #gaia, #header, #panel div.reverse, #panel .dir .summary
                    {
                    display: none;
                    }
                }

            .iw .dir .card .chooser
                {
                font-weight: bold;
                text-align: left;
                }

            .iw .dir .submitdir
                {
                display: inline;
                margin: 0;
                padding: 0;
                margin-left: 0.1em;
                }

            .iw .addr
                {
                padding-top: 0.5em;
                }

            .iw span.backbutton
                {
                font-size: 0.85em;
                color: #7777cc;
                }
        </style>

        <script type = "text/javascript"> //<![CDATA[
            var G_INCOMPAT = false;

            function GScript(src)
                {
                document.write('<' + 'script src="' + src + '"' + ' type="text/javascript"><' + '/script>');
                }

            function GBrowserIsCompatible()
                {
                if (G_INCOMPAT)
                    return false;

                if (!window.RegExp)
                    return false;

                var AGENTS = ["opera", "msie", "safari", "firefox", "netscape", "mozilla"];
                var agent = navigator.userAgent.toLowerCase();

                for (var i = 0; i < AGENTS.length; i++)
                    {
                    var agentStr = AGENTS[i];

                    if (agent.indexOf(agentStr) != -1)
                        {
                        var versionExpr = new RegExp(agentStr + "[ \/]?([0-9]+(\.[0-9]+)?)");
                        var version = 0;

                        if (versionExpr.exec(agent) != null)
                            {
                            version = parseFloat(RegExp.$1);
                            }

                        if (agentStr == "opera")
                            return version >= 7;

                        if (agentStr == "safari")
                            return version >= 125;

                        if (agentStr == "msie")
                            return (version >= 5.5 && agent.indexOf("powerpc") == -1);

                        if (agentStr == "netscape")
                            return version > 7;
                        }
                    }

                return document.getElementById;
                }

            function GLoad()
                {
                GLoadApi(["http://kolia.pp.ru/maps/mt.php?n=404&v=w2.12&"], 
			 ["http://kolia.pp.ru/maps/kh.php?n=404&v=8&"], 
			 ["http://kolia.pp.ru/maps/mt.php?n=404&v=w2t.13&"]);
                }

            function GUnload()
                {
                if (window.GUnloadApi)
                    {
                    GUnloadApi();
                    }
                }

            var _mFlags =
                {
                "doContinuousZoom": true,
                "doScrollWheelZoom": true,
                "enableOverviewMap": true,
                "doDoubleClickZoom": true
                };

            var _mHost = "http://kolia.pp.ru";
            var _mUri = "/maps/maps.php";
            var _mDomain = "kolia.pp.ru";
            var _mStaticPath = "http://kolia.pp.ru/maps/static/";
            var _mTermsUrl = "http://www.google.com/intl/en_ALL/help/terms_local.html";
            var _mTerms = "Terms of Use";
            var _mMapMode = "Map";
            var _mMapModeShort = "Map";
            var _mMapError =
                    "We are sorry, but we don\'t have maps at this zoom level for this region.<p>Try zooming out for a broader look.</p>";
            var _mSatelliteMode = "Satellite";
            var _mSatelliteModeShort = "Sat";
            var _mSatelliteError =
                    "We are sorry, but we don\'t have imagery at this zoom level for this region.<p>Try zooming out for a broader look.</p>";
            var _mHybridMode = "Hybrid";
            var _mHybridModeShort = "Hyb";
            var _mSatelliteToken = "fzwq2qo4oAawwdTNaID1r2uVro92jkMNRF08Ug";
            var _mZoomIn = "Zoom In";
            var _mZoomOut = "Zoom Out";
            var _mZoomSet = "Click to set zoom level";
            var _mZoomDrag = "Drag to zoom";
            var _mPanWest = "Go left";
            var _mPanEast = "Go right";
            var _mPanNorth = "Go up";
            var _mPanSouth = "Go down";
            var _mLastResult = "Return to the last result";
            var _mMapCopy = "Map data &#169;2006 ";
            var _mSatelliteCopy = "Imagery &#169;2006 ";
            var _mGoogleCopy = "&#169;2006 Google";
            var _mKilometers = "km";
            var _mMiles = "mi";
            var _mMeters = "m";
            var _mFeet = "ft";
            var _mPreferMetric = true;
            var _mUsePrintLink =
                    'To see all the details that are visible on the screen,use the "Print" link next to the map.';
            var _mPrintSorry = '';
            var _mMapPrintUrl = 'http://kolia.pp.ru/maps/mapprint.php';
            var _mAutocompleteFrom = 'from';
            var _mAutocompleteTo = 'to';
            var _mAutocompleteNearRe = '^(?:(?:.*?)&#92;s+)(?:(?:in|near|around|close to):?&#92;s+)(.+)$';
            var _mSvgEnabled = true;
            var _mSvgForced = false;
            var _mLogInfoWinExp = 'false';

            function GLoadMapsScript()
                {
                if (GBrowserIsCompatible())
                    {
                    GScript("http://kolia.pp.ru/maps/maps2.58.js");
                    }
                }                         //]]>
        </script>

        <script type = "text/javascript"> //<![CDATA[
            if (!GBrowserIsCompatible())
                {
                location.href = "<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/" . $_SERVER['REQUEST_URI']; ?>";
                }

            function e(id)
                {
                return document.getElementById(id);
                }

            function acinit(id, split)
                {
                }

            function spinit(id)
                {
                var o = e(id);

                if (o)
                    {
                    new GSmartPaste(o);
                    }
                }

            var gApplication = null;
            var gAddressBook = null;
            var gWhereMsg = "Where e.g., \"poughkeepsie\"";
            var gAddrMsg = "e.g., \"10 market st, san francisco\" or \"hotels near lax\"";
            var gWhatMsg = "What e.g., \"pizza\"";
            var gMsg =
                {
                q_d: gAddrMsg,
                l_d: gWhatMsg,
                l_near: gWhereMsg,
                d_d: "",
                d_daddr: ""
                };

            function loadApplication()
                {
                var a = gApplication = new GMapsApplication(e("map"));
                GEvent.addListener(a.getMap(), "moveend", updatePageUrl);
                GEvent.addListener(a.getOverviewMapControl(), "changed", updatePageUrl);

                for (var i in gMsg)
                    {
                    spinit(i);
                    }

                new GOverlayManager(a);
                new GParserErrors(a);
                }

            function updatePageUrl()
                {
                var url = gApplication.getPageUrl();
                e("link").href = url;
                e("email").href = "mailto:?subject=" + encodeURIComponent("Google Maps") + "&body="
                                      + encodeURIComponent(url);
                }

            function flipDefault()
                {
                gApplication.infoWindowProcess(function(n)
                    {
                    if (n.id == 'setas')
                        n.style.display = 'none';

                    if (n.id == 'setasconfirm')
                        n.style.display = '';
                    });
                }

            function setDefaultLocation(n)
                {
                GDownloadUrl(n.href, flipDefault);
                return false;
                }

            function getWindowHeight()
                {
                if (window.self && self.innerHeight)
                    {
                    return self.innerHeight;
                    }

                if (document.documentElement && document.documentElement.clientHeight)
                    {
                    return document.documentElement.clientHeight;
                    }

                return 0;
                }

            function loadUrl(simpleUrl)
                {
                var url = simpleUrl + "&output=js";

                if (gApplication)
                    {
                    url += gApplication.getVPageUrlParams();
                    }

                e("vp").src = url;
                return false;
                }

            function openInfoWindow(id, opt_point)
                {
                if (gApplication && id != "")
                    {
                    gApplication.openInfoWindow(id, opt_point);
                    return false;
                    }

                return true;
                }

            function prepareForm(form, cid)
                {
                gApplication.prepareForm(form, cid);
                }

            function showPolylineBlowup(lineId, index)
                {
                if (gApplication)
                    {
                    gApplication.showPolylineBlowup(lineId, index);
                    return false;
                    }

                return true;
                }

            function toggleCsi(ev, id, control)
                {
                if (typeof GClassToggle != "undefined")
                    {
                    var el = e(id);
                    GClassToggle(ev, el, ["dircsi_hidden", "dircsi"], control, ["csiopener", "csicloser"]);
                    return false;
                    }

                return true;
                }

            function resizeMap()
                {
                var offset = 0;

                for (var elem = e("map"); elem != null; elem = elem.offsetParent)
                    {
                    offset += elem.offsetTop;
                    }

                var windowHeight = getWindowHeight();
                var height = windowHeight - offset - 10;

                if (height >= 0)
                    {
                    e("map").style.height = height + "px";
                    e("panel").style.height = (height + 4) + "px";
                    }
                }

//            var gForms = ["q", "l", "d"];

            function switchForm(name)
                {
                return false;
                }

            function isSelected(form)
                {
                return e(form + "_l").className == "selected";
                }

            function isDeflt(f)
                {
                return (e(f) && e(f).value && e(f).value == gMsg[f]);
                }

            function tabUrl(url)
                {
                if (gApplication)
                    {
                    var q = "";
                    var sel = "selected";

                    for (var f in gMsg)
                        {
                        if (isDeflt(f))
                            {
                            e(f).value = "";
                            }
                        }

                    if (isSelected("q"))
                        {
                        q = e("q_d").value;
                        }

                    else if (isSelected("l"))
                        {
                        q = e("l_d").value;

                        if (e("l_near").value)
                            {
                            q += " near: " + e("l_near").value;
                            }
                        }

                    else if (isSelected("d"))
                        {
                        if (e("d_d").value)
                            {
                            q = "from: " + e("d_d").value;
                            }

                        if (e("d_daddr").value)
                            {
                            q += " to: " + e("d_daddr").value;
                            }
                        }

                    return gApplication.getTabUrl(url, q);
                    }

                else
                    {
                    return url;
                    }
                }

            function onSearch(form)
                {
                if (gApplication)
                    {
                    gApplication.prepareMainForm(form);
                    }

                for (var f in gMsg)
                    {
                    if (isDeflt(f))
                        {
                        e(f).value = "";
                        setTimeout(function()
                            {
                            onBlur(f);
                            },     0);
                        }
                    }

                return true;
                }

            var gPendingVPage = null;
            var gInitialPage = true;

            function loadVPage(vPage, stateBox)
                {
                gInitialPage = false;
                eval("try { e('q_d').focus(); } catch (e) {}");

                if (gApplication)
                    gApplication.clear();

                loadVPageText(vPage);

                if (!gApplication)
                    {
                    gPendingVPage = vPage;
                    gPendingState = stateBox;
                    return;
                    }

                else
                    {
                    gApplication.loadVPage(vPage, stateBox);
                    updatePageUrl();
                    }
                }

            function loadHomePage()
                {
                if (!gInitialPage)
                    {
                    loadVPage(gHomeVPage, e("homestate"));
                    }
                }

            function loadPending()
                {
                if (gPendingVPage)
                    {
                    gApplication.loadVPage(gPendingVPage, gPendingState);
                    updatePageUrl();
                    }
                }

            function d0(id)
                {
                e(id).style.display = "none";
                }

            function d1(id)
                {
                e(id).style.display = "";
                }

            function loadVPageText(vPage)
                {
                window.document.title = vPage.title;

                if (vPage.vartitle)
                    {
                    d0("title");
                    d0("links");
                    d1("vartitle");
                    e("vartitle").innerHTML = vPage.vartitle;
                    }

                else
                    {
                    d1("title");
                    d1("links");
                    d0("vartitle");
                    }

                switchForm(vPage.form.selected);
                var p = e("panel");
                var ps = p.style;
                var pd = (ps.display != "none");
                var pw = (ps.width == "100%");
                var m = e("map");
                var ms = m.style;

                if (vPage.panel)
                    {
                    p.innerHTML = vPage.panel;
                    p.scrollTop = 0;

                    if (vPage != gHomeVPage && typeof p.focus == "function")
                        {
                        p.focus();
                        }

                    if (vPage.panelStyle == "full")
                        {
                        if (!pw)
                            {
                            ps.width = "100%";
                            ps.backgroundColor = "white";
                            }
                        }

                    else
                        {
                        if (pw)
                            {
                            ps.width = "";
                            ps.backgroundColor = "";
                            }
                        }

                    if (!pd)
                        {
                        ms.marginLeft = "";
                        ps.display = "";
                        }
                    }

                else
                    {
                    if (pd)
                        {
                        ps.display = "none";
                        ms.marginLeft = "0px";
                        p.innerHTML = "";
                        }
                    }
                }

            function onBlur(f)
                {
                var w = e(f);

                if (w.value.length == 0 || w.value == gMsg[f])
                    {
                    w.style.color = "gray";
                    w.value = gMsg[f];
                    }

                else
                    {
                    w.style.color = "";
                    }
                }

            function onFocus(w)
                {
                if (w.style.color == "gray")
                    {
                    w.value = "";
                    w.style.color = "";
                    }
                }

            var gHomeVPage =
                {
                title: "Google Maps",
                vartitle: "",
                url: "/?ie=UTF8&om=1",
                urlViewport: false,
                form:
                    {
                    selected: "q",
                    q:
                        {
                        q: ""
                        },
                    l:
                        {
                        q: "",
                        near: ""
                        },
                    d:
                        {
                        saddr: "",
                        daddr: ""
                        }
                    },
                viewport:
                    {
                    center:
                        {
                        lat: <?php echo $center['lat']; ?>,
                        lng: <?php echo $center['lng']; ?>
//                        lat: 37.062500,
//                        lng: -95.677068
                        },
                    span:
                        {
                        lat: <?php echo $span['lat']; ?>,
                        lng: <?php echo $span['lng']; ?>
//                        lat: 23.875000,
//                        lng: 57.630033
                        },
                    mapType: null
                    },
                overlays:
                    {
                    markers: [],
                    polylines: [],
                    polygons: []
                    },
/*                panel:
    '<div class=\"hp\"><div class=\"noprint hdr\">Example searches:</div><table class=\"noprint\"><tr><td class=\"subhdr\">Go to a location</td></tr><tr><td class=\"eg\"><a href=\"/?ie=UTF8&amp;om=1&amp;hl=en&amp;q=kansas+city&amp;f=q&amp;sampleq=1\" onclick=\"return loadUrl(this.href)\">kansas city</a></td></tr><tr><td class=\"eg\"><a href=\"/?ie=UTF8&amp;om=1&amp;hl=en&amp;q=10+market+st,+san+francisco&amp;f=q&amp;sampleq=1\" onclick=\"return loadUrl(this.href)\">10 market st, san francisco</a></td></tr><tr><td class=\"subhdr\">Find a business</td></tr><tr><td class=\"eg\"><a href=\"/?ie=UTF8&amp;om=1&amp;hl=en&amp;q=hotels+near+lax&amp;f=q&amp;sampleq=1\" onclick=\"return loadUrl(this.href)\">hotels near lax</a></td></tr><tr><td class=\"eg\"><a href=\"/?ie=UTF8&amp;om=1&amp;hl=en&amp;q=pizza&amp;f=q&amp;sampleq=1\" onclick=\"return loadUrl(this.href)\">pizza</a></td></tr><tr><td class=\"subhdr\">Get directions</td></tr><tr><td class=\"eg\"><a href=\"/?ie=UTF8&amp;om=1&amp;hl=en&amp;q=jfk+to+350+5th+ave,+new+york&amp;f=q&amp;sampleq=1\" onclick=\"return loadUrl(this.href)\">jfk to 350 5th ave, new york</a></td></tr><tr><td class=\"eg\"><a href=\"/?ie=UTF8&amp;om=1&amp;hl=en&amp;q=seattle+to+98109&amp;f=q&amp;sampleq=1\" onclick=\"return loadUrl(this.href)\">seattle to 98109</a></td></tr></table><div class=\"noprint tour\">Drag the map with your mouse, or double-click to zoom.&#160;<a href=\"http://www.google.com/intl/en_ALL/help/maps/tour/\">Take a tour &#187;</a></div><div class=\"lbc noprint\"><p>Business Owners: <a href=\"http://www.google.com/local/add?hl=en\">Add/Edit Your Business</a></p></div></div>', */
                panelStyle: ''
                }; //]]>
        </script>
    </head>

    <body onresize = "resizeMap()" onunload = "GUnload()"
          onload = "var rnl_near = document.getElementById('rnl_near');if (rnl_near) {rnl_near.focus();}">
        <!-- Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
    var pageTracker = _gat._getTracker("UA-7476874-1");
    pageTracker._trackPageview();
} catch(err) {}</script>
<!-- Google Analytics -->

        <iframe name = "vp" id = "vp" src = "/maps/static/home3.html">
        </iframe>

        <input type = "text" id = "homestate"/>

        <div id = "header">
            <table id = "search">

                <tr>
                    <td class = "box">
                        <table>
                            <tr>
                                <td>
                                    <div class = "bxfm">
                                        <div id = "q_f">
                                        </div>

                                        <div id = "l_f" style = "display: none">
                                            <form id = "l_form" action = "/maps" target = "vp"
                                                  onsubmit = "return onSearch(this)">
                                                <input type = "hidden" name = "f" value = "l"/>

                                                <input type = "hidden" name = "output" value = "js"/>

                                                <input type = "hidden" name = "hl" value = "en"/>

                                                <input type = "hidden" name = "sll" value = ""/>

                                                <input type = "hidden" name = "sspn" value = ""/>

                                                <table class = "form">
                                                    <tr class = "input">
                                                        <td>
                                                            <div class = "ipt">
                                                                <table>
                                                                    <tr>
                                                                        <td>
                                                                            <input id = "l_d"
                                                                                   type = "text"
                                                                                   name = "q"
                                                                                   tabindex = "3"
                                                                                   size = "22"
                                                                                   onfocus = "onFocus(this)"
                                                                                   onblur = "onBlur(this.id)"/>
                                                                        </td>

                                                                        <td class = "nopr">
                                                                            <input id = "l_near"
                                                                                   type = "text"
                                                                                   name = "near"
                                                                                   tabindex = "4"
                                                                                   onblur = "onBlur(this.id)"
                                                                                   size = "36"
                                                                                   onfocus = "onFocus(this)"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>

                                                        <td class = "vbtn">
                                                            <input type = "submit" name = "btnG"
                                                                   tabindex = "5"  class = "btn"
                                                                   value = "Search Businesses"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>

                                        <div id = "d_f" style = "display: none">
                                            <form id = "d_form" action = "/maps" target = "vp"
                                                  onsubmit = "return onSearch(this)">
                                                <input type = "hidden" name = "f" value = "d"/>

                                                <input type = "hidden" name = "output" value = "js"/>

                                                <input type = "hidden" name = "hl" value = "en"/>

                                                <input type = "hidden" name = "sll" value = ""/>

                                                <input type = "hidden" name = "sspn" value = ""/>

                                                <table class = "form">
                                                    <tr class = "input">
                                                        <td>
                                                            <div class = "ipt">
                                                                <table>
                                                                    <tr>
                                                                        <td>
                                                                            <input id = "d_d"
                                                                                   type = "text"
                                                                                   name = "saddr"
                                                                                   tabindex = "6"
                                                                                   size = "29"
                                                                                   onfocus = "onFocus(this)"
                                                                                   onblur = "onBlur(this.id)"/>
                                                                        </td>

                                                                        <td class = "pr">
                                                                            <a href = "/maps/maps.php?f=d"
                                                                               onclick = "var f=window.e('d_form');var tmp=isDeflt('d_d')?'':window.e('d_d').value;f.saddr.value=isDeflt('d_daddr')?'':window.e('d_daddr').value;f.daddr.value = tmp;onBlur('d_d');onBlur('d_daddr');return false;">

                                                                            <img width = "10"
                                                                                 height = "14"
                                                                                 alt = "Switch start and end address"
                                                                                 title = "Switch start and end address"
                                                                                 src = "/maps/static/ddirflip.gif"/></a>
                                                                        </td>

                                                                        <td class = "nopr">
                                                                            <input type = "text"
                                                                                   id = "d_daddr"
                                                                                   name = "daddr"
                                                                                   tabindex = "7"
                                                                                   size = "28"
                                                                                   onfocus = "onFocus(this)"
                                                                                   onblur = "onBlur(this.id)"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>

                                                        <td class = "vbtn">
                                                            <input type = "submit" name = "btnG"
                                                                   tabindex = "8"  class = "btn"
                                                                   value = "Get Directions"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>

            <table id = "titlebar">
                <tr>
                    <td class = "title">
                        <span id = "title">Maps</span><span id = "vartitle"></span>
		    </td>

			<td>
				См. также <a href="http://maps.yandex.ru/?ll=40.406716%2C56.136497&spn=0.247536%2C0.111956&z=12&l=map">Яндекс</a> <a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=vladimir&sll=56.127701,40.407559&sspn=0.217373,0.44014&ie=UTF8&hq=&hnear=Russian+Federation,+Province+of+Vladimir,+Vladimir&t=h&z=11&iwloc=A">Google</a> <a href="http://wikimapia.org/#lat=56.1400026&lon=40.3999901&z=13&l=1&m=b">Wikimapia</a>
			</td>

                    <td class = "links" id = "links">
                        <a href = "javascript: void (0)"id = "print">

                        <img src = "/maps/static/bar_icon_print_2.gif" alt = "Print"/>
                        <span>Print</span></a>

			<a href = "/maps/maps.php" id = "email">

                        <img src = "/maps/static/bar_icon_email_2.gif" alt = "Email"/>
                        <span>Email</span></a>

			<a href = "/maps/maps.php" id = "link">

                        <img src = "/maps/static/bar_icon_link.gif" alt = "Link to this page"/>
                        <span>Link to this page</span></a>
                    </td>
                </tr>
            </table>
        </div>

        <div id = "printheadarea" class = "noscreen">
            <table class = "printheadtable">
                <tr>
                    <td class = "logo">
                        <a href = "/maps/maps.php">

                        <img src = "http://kolia.pp.ru/maps/static/maps_results_logo.gif"
                             width = "150"
                             height = "55"
                             alt = "Go to Google Maps Home"/></a>
                    </td>

                    <td>
                    </td>

                    <td>
                        <div id = "printheader">
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div id = "page">
            <div id = "map">
                <div class = "loading">
                    Loading...
                </div>
            </div>

            <div id = "panel">
            </div>
	</div>

        <script type = "text/javascript"> //<![CDATA[
            if (e("resulttabs") && document.location.pathname != "/lochp"
                && document.location.pathname != "/maphp")
                {
                e("resulttabs").style.display = "";
                e("hometabs").style.display = "none";
                }

            resizeMap();

            if (!gPendingVPage)
                {
                loadVPageText(gHomeVPage);
                gPendingVPage = gHomeVPage;
                gPendingState = e("homestate");
                }

            GLoadMapsScript(); //]]>
        </script>

        <img src = "/maps/static/transparent.png" style = "display:none" alt = ""/>

        <script type = "text/javascript"> //<![CDATA[
            g = null;

            loadApplication();
            loadPending(); //]]>
        </script>
    </body>
</html>

