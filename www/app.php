<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Atonal Records</title>
        
        <link href="../images/site/favicon.png" rel="shortcut icon" type="image/x-icon">
        <link href="../css/materialize.min.css" rel="stylesheet" type="text/css">
        <link href="../icons/material-icons/css/material-icons.css" rel="stylesheet" type="text/css">
        <link href="../icons/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
        <link href="../css/font-face.css" rel="stylesheet" type="text/css">
        <link href="../css/index.css" rel="stylesheet" type="text/css"/>
        <!--SEO meta tags-->
        <meta name="application-name" content="Atonal Records">
        <meta name="description" content="An internet label within South Africa, specialising in electronic/electronica recordings. Established in 2014; catering for upcoming musicians and the rest">
        <meta name="keywords" content="Atonal Records">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Facebook sharer meta tags-->
        <meta property="fb:app_id" content="453891951818018">
        <meta property="og:title" content="Atonal Records">
        <meta property="og:type" content="website">
        <meta property="og:image" content="https://atonalrecords.co.za/images/site/facebook.png">
        <meta property="og:url" content="https://atonalrecords.co.za/site/index">
        <meta property="og:description" content="A netlabel within South Africa, specialising in electronic/electronica recordings. Established in 2014; catering for upcoming musicians">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <!--Twitter card/sharer meta tags-->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Atonal Records">
        <meta name="twitter:description" content="A netlabel within South Africa, specialising in electronic/electronica recordings. Established in 2014; catering for upcoming musicians">
        <meta name="twitter:image" content="https://atonalrecords.co.za/images/site/twitter.png">
								
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/materialize.min.js"></script>
        <script src="../js/wavesurfer.min.js"></script>
        <script src="../js/wavesurfer.regions.min.js"></script>
    </head>
    <body onload="year();">
        <div id='web-player' class="web-player z-index-3 w-100 pin-sticky top">
            <div class="row grey lighten-3 no-padding-bottom">
                <div class="col l1 s3 white-text valign-wrapper btn-playback-panel">
                    <span class="btn-playback btn btn-round center-block grey lighten-2 z-depth-0" id='btn-playback'><i class='fa fa-play grey-text'></i></span>
                </div>
                <div class="col l6 s6 white-text valign-wrapper no-padding waveform-panel">
                    <div id="waveform" class='w-100 truncate grey-text'>
                        <span id='sm-title' class='grey-text padding-left-4 hide-on-med-and-up'></span><span id='sm-musician' class='grey-text padding-left-4 hide-on-med-and-up'></span>
                    </div>
                </div>
                <div class="col l1 s3 white-text valign-wrapper btn-mute-panel">
                    <span id='btn-mute' class="btn btn-round center-block grey lighten-2 z-depth-0"><i class='fas fa-volume-up grey-text'></i></span>
                </div>
                <div class="col l1 s1 white-text valign-wrapper artwork-panel hide-on-med-and-down">
                    <div class="artwork-wrapper center-block">
                        <img id='lg-artwork' src='' width="80px">
                    </div>
                </div>
                <div class="col l3 s3 white-text valign-wrapper metadata-panel hide-on-med-and-down">
                    <div class="metadata">
                        <span id='lg-title' class="grey-text text-darken-1"></span><br>
                        <span id='lg-musician' class="grey-text text-darken-1"></span><br>
                        <span id='lg-version' class="hide-on-small-and-down grey-text text-darken-1"></span><span id='lg-date' class="hide-on-small-and-down grey-text text-darken-1"></span><span id='lg-genre' class="hide-on-small-and-down grey-text text-darken-1"></span><br><span id='lg-current' class="hide-on-small-and-down grey-text text-darken-1"></span><span id='lg-remaining' class="hide-on-small-and-down grey-text text-darken-1"></span><span id='lg-total' class="hide-on-small-and-down grey-text text-darken-1"></span> <span id='lg-duration' class="hide-on-small-and-down grey-text text-darken-1"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-default-authorization" class="modal bottom-sheet">
            <div class="modal-content grey-text">
                <div class="row">
                    <div class="col l6">
                        <h6>Login to your account</h6>
                        <form id="modal-default-login-form">
                            <div class="row">
                                <div class="col l6">
                                    <div class="input-field">
                                        <input type="email" id="email" name="email" data-error=".email">
                                        <label for="email">Email</label>
                                        <span class="helper-text email"></span>
                                    </div>
                                    <div class="input-field">
                                        <input type="password" id="password" name="password" data-error=".password">
                                        <label for="password">Password</label>
                                        <span class="helper-text password"></span>
                                    </div>
                                    <div class="input-field">
                                        <button class="btn btn-login btn-round waves-effect waves-light grey submit">LOG IN</button>
                                        <a class="password-recovery btn btn-flat grey-text" id="forgot-password">Forgot your password?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col l6">
                        <h6>Do not have an account?</h6>
                        <p>Become a member?</p>
                        <button class="register btn btn-round waves-effect waves-light grey white-text">Register</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal default stream">
            <div class="modal-content grey-text">
                <div class="row no-padding-bottom w-100 h-100 valign-wrapper">
                    <div class="col s6 l6">
                        <div class="card">
                            <div class="card-image">
                                <img id="session-modal-artwork" class="responsive-img" src="">
                            </div>
                        </div>
                    </div>
                    <div class="col s6 l6">
                        <div>
                            <div class="row">
                                <div class="col l12 center-align">
                                    <p>
                                        <h4><b>Start listening with a free Atonal Records account</b></h4>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col l12">
                                    <a class="btn btn-round w-100 orange">LOGIN FREE</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col l12">
                                    <button class="btn btn-round w-100 grey modal-close">CONTINUE</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col l12">
                                    <p class="center-align">Already have an account? <b>Log In</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal stream bottom-sheet">                
            <div class="row no-padding-bottom w-100 vh-100 valign-wrapper grey-text">
                <div class="col s12 l6">
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="col s8">
                            <div class="card">
                                <div class="card-image">
                                    <img id="session-modal-bottom-sheet-artwork" class="responsive-img" src="">
                                </div>
                            </div>
                        </div>
                        <div class="col s2"></div>
                    </div> 
                    <div class="row">
                        <div class="col l12 center-align">
                            <p>
                                <h5><b>Start listening with a free Atonal Records account</b></h5>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 l12">
                            <a class="btn btn-round w-100 orange">LOGIN FREE</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 l12">
                            <button class="btn btn-round w-100 grey modal-close">CONTINUE</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 l12">
                            <p class="center-align">Already have an account? <b>Log In</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="navigation"></div>-->
        <div class="navbar-fixed">
            <nav class="nav-wrapper white z-depth-0">
                <div>
                    <div class="logo container">
                        <a class="brand-logo hide-on-med-and-down"><img src="../images/site/logo.png" alt="logo" class="brand-logo-64"></a>
                    </div>
                    <a class="brand-logo hide-on-large-only"><img src="../images/site/logo.png" alt="logo" class="brand-logo-56"></a>
                    <a class="sidenav-trigger show-on-medium-and-up" data-target="sidenav"><i class="material-icons" >menu</i></a>
                    <ul class="hide-on-med-and-down right">
                        <li>
                            <a href="#" id="modal-default-authorization-trigger" class=""></a>
                        </li>
                        <li>
                            <a href="#" id="nav-ul-li-profile" class="dropdown-trigger" data-target="dropdown-account"><i class="fa fa-user fa-1x"></i></a>
                            <ul id='dropdown-account' class='dropdown-content'>
                                <li><a id="dropdown-content-li-account">Account</a></li>
                                <li><a class="logout" id="dropdown-content-li-logout">Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="cart">
                                <span class="pin-top">
                                    <i class="fa fa-shopping-cart fa-1x"></i>
                                    <div class='floating ui orange circular label tiny'>
                                        <span id='circular-label-1st-child'>    
                                        </span>
                                    </div>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="library"><i class="fa fa-cloud-download-alt fa-1x"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="navbar-fixed pin-absolute bottom hide-on-med-and-up z-index-4">
            <nav class="nav-wrapper override-position white">
                <div class="container">
                    <ul class="hide-on-med-and-up">
                        <li>
                            <a class="account"><i class="fa fa-user fa-1x"></i></a>
                        </li>
                        <li>
                            <a class="cart">
                                <span class="pin-top">
                                    <i class="fa fa-shopping-cart fa-1x"></i>
                                    <div class='floating ui orange circular label tiny'>
                                        <span id='circular-label-2nd-child'>    
                                        </span>
                                    </div>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="library"><i class="fa fa-cloud-download-alt fa-1x"></i></a>
                        </li>
                        <li>
                            <a href="#" id="modal-bottom-sheet-authorization-trigger" class=""><i class="fas fa-sign-in-alt fa-1x"></i></a>
                        </li>
                    </ul>                  
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="sidenav">
            <a class="brand-logo"><img src="../images/site/menu.png" class="responsive-img" alt="logo"></a>
            <li><a class="index waves-effect waves-light sidenav-close">Explore</a></li>
            <li><a class="about waves-effect waves-light sidenav-close">About</a></li>
            <li><a class="support waves-effect waves-light sidenav-close">Support</a></li>
        </ul>
        <main>
            <div class="content">
                <div class="container grey-text">
                    <h3>Shop by Genre</h3>
                    <div class="row shop-by-genre">  
                    </div>
                    <h3>Whats new</h3>
                    <div class="row whats-new">
                    </div>
                    <h3>Featured</h3>
                    <p>No featured recordings yet.</p>
                </div>
            </div>
        </main>
        <footer class="page-footer grey white-text">
            <div class="container">
                <div class="row">
                    <div class="col s6 m10 l10  hide-on-med-and-down">
                        <div class="col l2"><a class="modal-trigger white-text" href="#about">About This Site</a></div><div class="col l2"><a class="modal-trigger white-text" href="#terms">Terms of Use</a></div><div class="col l2"><a class="modal-trigger white-text" href="#privacy">Privacy Policy</a></div>
                        <div id="about" class="modal modal-fixed-footer">
                            <div class="modal-content grey-text">
                                <div class="right"><a class="btn btn-flat btn-floating modal-close white grey-text"><i class="material-icons grey-text">close</i></a></div>
                                <h4>About This Site</h4>
                                <p>This is Atonal Records main public facing website. It is managed and maintained by <a href="https://www.facebook.com/mcgamacorp" target="_blank">McGama Corporation</a> on behalf of Atonal Records. Pages within this site will have addresses like this: www.atonalrecords.co.za/<b>folder</b>/<b>page</b>.</p>
                                <h5>Accessibility</h5>
                                <p>The central site has been designed to conform to the W3C (World Wide Web Consortium) WCAG 2.0 AA guidelines.</p>
                                <h5>Contacting the webmaster</h5>
                                <p>If you have any comments  or suggestions about Atonal Record's website, please click <a href="mailto: aphiwemagama@yahoo.com">here</a>.</p>
                                <h5>Site Design and hosting</h5>
                                <p>This site was designed by <a href="https://www.facebook.com/apmagama">Aphiwe Magama</a> for <a href="https://www.facebook.com/mcgamacorp" target="_blank">McGama Corporation</a>.</p>
                            </div>
                        </div>
                        <div id="terms" class="modal modal-fixed-footer">
                            <div class="modal-content grey-text">
                                <div class="right"><a class="btn btn-flat btn-floating modal-close white grey-text"><i class="material-icons grey-text">close</i></a></div>
                                <h4>Terms of Use</h4>
                                <p>These terms and conditions outline the rules and regulations for the use of Atonal Records's Website.</p>
                                <p>By accessing this website we assume you accept these terms and conditions in full. Do not continue to use Atonal Records's website 
                                if you do not accept all of the terms and conditions stated on this page.</p>
                                <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice
                                and any or all Agreements: "Client", "You" and "Your" refers to you, the person accessing this website
                                and accepting the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers
                                to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves, or either the Client
                                or ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake
                                the process of our assistance to the Client in the most appropriate manner, whether by formal meetings
                                of a fixed duration, or any other means, for the express purpose of meeting the Client’s needs in respect
                                of provision of the Company’s stated services/products, in accordance with and subject to, prevailing law
                                of . Any use of the above terminology or other words in the singular, plural,
                                capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
                                <h5>Cookies</h5>
                                <p>We employ the use of cookies. By using Atonal Records's website you consent to the use of cookies 
                                in accordance with Atonal Records’s privacy policy.</p><p>Most of the modern day interactive web sites
                                use cookies to enable us to retrieve user details for each visit. Cookies are used in some areas of our site
                                to enable the functionality of this area and ease of use for those people visiting. Some of our 
                                affiliat /advertising partners may also use cookies.</p>
                                <h5>License</h5>
                                <p>Unless otherwise stated, Atonal Records and/or it’s licensors own the intellectual property rights for
                                all material on Atonal Records. All intellectual property rights are reserved. You may view and/or print
                                pages from https://www.atonalrecords.co.za for your own personal use subject to restrictions set in these terms and conditions.</p>
                                <p>You must not:</p>
                                <ol>
                                    <li>Republish material from https://www.atonalrecords.co.za</li>
                                    <li>Sell, rent or sub-license material from https://www.atonalrecords.co.za</li>
                                    <li>Reproduce, duplicate or copy material from https://www.atonalrecords.co.za</li>
                                </ol>
                                <p>Redistribute content from Atonal Records (unless content is specifically made for redistribution).</p>
                                <h5>Hyperlinking to our Content</h5>
                                <ol>
                                    <li>The following organizations may link to our Web site without prior written approval:<br>
                                        <ol class="list-style-type-square">
                                            <li>Government agencies</li>
                                            <li>Search engines</li>
                                            <li>News organizations</li>
                                            <li>Online directory distributors when they list us in the directory may link to our Web site in the same manner as they hyperlink to the Web sites of other listed businesses; and</li>
                                            <li>Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
                                        </ol>
                                    </li>
                                </ol>
                                <ol start="2">
                                    <li>These organizations may link to our home page, to publications or to other Web site information so long as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party's site.
                                    </li>
                                    <li>We may consider and approve in our sole discretion other link requests from the following types of organizations:
                                        <ol class="list-style-type-square">
                                            <li>commonly-known consumer and/or business information sources such as Chambers of Commerce, American Automobile Association, AARP and Consumers Union;</li>
                                            <li>community sites</li>
                                            <li>associations or other groups representing charities, including charity giving sites</li>
                                            <li>online directory distributors</li>
                                            <li>internet portals</li>
                                            <li>accounting, law and consulting firms whose primary clients are businesses</li>
                                            <li>educational institutions and trade associations</li>
                                        </ol>
                                    </li>
                                </ol>
                                <p>These organizations may link to our home page, to publications or to other Web site information so long as
                                the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval
                                of the linking party and it products or services; and (c) fits within the context of the linking party's
                                site.</p>
                                <p>If you are among the organizations listed in paragraph 2 above and are interested in linking to our website,
                                you must notify us by sending an e-mail to <a href="mailto:info@atonalrecords.co.za" title="send an email to info@atonalrecords.co.za">info@atonalrecords.co.za</a>.
                                Please include your name, your organization name, contact information (such as a phone number and/or e-mail
                                address) as well as the URL of your site, a list of any URLs from which you intend to link to our Web site,
                                and a list of the URL(s) on our site to which you would like to link. Allow 2-3 weeks for a response.</p>
                                <p>Approved organizations may hyperlink to our Web site as follows:</p>
                                <ol>
                                    <li>By use of our corporate name; or</li>
                                    <li>By use of the uniform resource locator (Web address) being linked to; or</li>
                                    <li>By use of any other description of our Web site or material being linked to that makes sense within the context and format of content on the linking party's site.</li>
                                </ol>
                                <p>No use of Atonal Records’s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>
                                <h5>Iframes</h5>
                                <p>Without prior approval and express written permission, you may not create frames around our Web pages or
                                use other techniques that alter in any way the visual presentation or appearance of our Web site.</p>
                                <h5>Reservation of Rights</h5>
                                <p>We reserve the right at any time and in its sole discretion to request that you remove all links or any particular
                                link to our Web site. You agree to immediately remove all links to our Web site upon such request. We also
                                reserve the right to amend these terms and conditions and its linking policy at any time. By continuing
                                to link to our Web site, you agree to be bound to and abide by these linking terms and conditions.</p>
                                <h5>Removal of links from our website</h5>
                                <p>If you find any link on our Web site or any linked web site objectionable for any reason, you may contact
                                us about this. We will consider requests to remove links but will have no obligation to do so or to respond
                                directly to you.</p>
                                <p>Whilst we endeavour to ensure that the information on this website is correct, we do not warrant its completeness
                                or accuracy; nor do we commit to ensuring that the website remains available or that the material on the
                                website is kept up to date.</p>
                                <h5>Content Liability</h5>
                                <p>We shall have no responsibility or liability for any content appearing on your Web site. You agree to indemnify
                                and defend us against all claims arising out of or based upon your Website. No link(s) may appear on any
                                page on your Web site or within any context containing content or materials that may be interpreted as
                                libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or
                                other violation of, any third party rights.</p>
                                <h5>Disclaimer</h5>
                                <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website (including, without limitation, any warranties implied by law in respect of satisfactory quality, fitness for purpose and/or the use of reasonable care and skill). Nothing in this disclaimer will:</p>
                                <ol>
                                <li>limit or exclude our or your liability for death or personal injury resulting from negligence;</li>
                                <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
                                <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
                                <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
                                </ol>
                                <p>The limitations and exclusions of liability set out in this Section and elsewhere in this disclaimer: (a)
                                are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer or
                                in relation to the subject matter of this disclaimer, including liabilities arising in contract, in tort
                                (including negligence) and for breach of statutory duty.</p>
                                <p>To the extent that the website and the information and services on the website are provided free of charge,
                                we will not be liable for any loss or damage of any nature.</p>	
                            </div>
                        </div>
                        <div id="privacy" class="modal modal-fixed-footer">
                            <div class="modal-content grey-text">
                                <div class="right"><a class="btn btn-flat btn-floating modal-close white grey-text"><i class="material-icons grey-text">close</i></a></div>
                                <h4>Privacy Policy</h4>
                                <p>At Atonal Records, accessible from atonalrecords.co.za, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Atonal Records and how we use it.</p>
                                <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at info@atonalrecords.co.za</p>
                                <h5>Log Files</h5>
                                <p>Atonal Records follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>
                                <h5>Privacy Policies</h5>
                                <p>You may consult this list to find the Privacy Policy for each of the advertising partners of Atonal Records. </p>
                                <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Atonal Records, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>
                                <p>Note that Atonal Records has no access to or control over these cookies that are used by third-party advertisers.</p>
                                <h5>Third Party Privacy Policies</h5>
                                <p>Atonal Records's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>
                                <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>
                                <h5>Online Privacy Policy Only</h5>
                                <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Atonal Records. This policy is not applicable to any information collected offline or via channels other than this website.</p>
                                <h5>Consent</h5>
                                <p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col l2 s12 right-align  center-align">
                        <a class="btn-floating btn-small blue darken-4 waves-effect waves-light" href="https://www.facebook.com/atonalrecords" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn-floating btn-small light-blue waves-effect waves-light" href="https://www.twitter.com/atonalrecords" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn-floating btn-small red waves-effect waves-light" href="https://www.youtube.com/channel/UCvSlDTkP0M8JsQm_vax1EgA?view_as=subscriber" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div id="footer" class="footer-copyright">
                <div class="container center-align white-text">
                    &copy; <span id="year"></span> Atonal Records. All Rights Reserved.
                </div>
            </div>
        </footer>
        <script src="script/webplayer.js"></script>
        <script src="../js/app.js"></script>
        <script src="../secure/script/categories.js"></script>
        <script src="../secure/script/session-storage.js"></script>
        <script src="../secure/script/register.js"></script>
        <script src="../secure/script/login.js"></script>
        <script src="../secure/script/add-to-cart.js"></script>
        <script src="../secure/script/count-from-cart.js"></script>
        <script src="../secure/script/remove-from-cart.js"></script>
        <script src="../secure/script/logout.js"></script>
        <script src="../secure/script/password-recovery.js"></script>
        <script src="../js/year.js"></script>
        <script> 
            $(document).ready(function() {
                $('.sidenav').sidenav();
                $('.modal').modal();
                $('.dropdown-trigger').dropdown({
                    constrain_width: false,
                    coverTrigger: false
                });
                $('.collapsible').collapsible();
            });
        </script>
    </body>
</html>
