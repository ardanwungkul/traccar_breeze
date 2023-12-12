<x-app-layout>
    <x-slot name="header">
        <div class=" min-h-[88vh] border-r border-gray-300 bg-white">
            <div style="background-image: linear-gradient(#F1F5FD, #E9F0FF); background-color: aliceblue; border-bottom: 1px solid #ddd"
                class="px-[15px] py-1">
                <p class="text-sm font-bold text-[#333333] leading-loose">My Account</p>
            </div>
            <div class="bg-white">
                <div class="py-[10px]">
                    <ul class="text-sm " id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li role="presentation">
                            <button class="inline-block button-tab py-2 px-5 w-full text-start leading-[normal]"
                                style="color: #666666" id="account-tab" data-tabs-target="#account" type="button"
                                role="tab" aria-controls="account" aria-selected="true" autofocus>Account
                                Details</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block button-tab py-2 px-5 w-full text-start leading-[normal]"
                                style="color: #666666" id="messages-tab" data-tabs-target="#messages" type="button"
                                role="tab" aria-controls="messages" aria-selected="false">Messages
                                (0)</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block button-tab py-2 px-5 w-full text-start leading-[normal]"
                                style="color: #666666" id="va-tab" data-tabs-target="#va" type="button"
                                role="tab" aria-controls="va" aria-selected="false">Virtual
                                Account</button>
                        </li>
                        <li role="presentation">
                            <a href="#"
                                class="inline-block button-tab py-2 px-5 w-full text-start leading-[normal]"
                                style="color: #666666">
                                Report
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </x-slot>
    <div id="myTabContent">
        <div class="hidden" id="account" role="tabpanel" aria-labelledby="account-tab">

            <div class="border-b bg-[aliceblue]" x-data="{
                openTab: 1,
                activeClasses: 'border-[1px] border-gray-300 border-b-0 rounded-t text-[#666666] bg-white',
                inactiveClasses: 'text-[#666666]'
            }" class="p-6">
                <ul class="flex border-b px-[15px] pt-[3px]">
                    <li @click="openTab = 1" :class="{ '': openTab === 1 }" class="-mb-px ">
                        <a href="#" :class="openTab === 1 ? activeClasses : inactiveClasses"
                            class="inline-block text-xs py-[7px] px-[15px] mt-[2px] font-bold">
                            Overview
                        </a>
                    </li>
                    <li @click="openTab = 2" :class="{ '': openTab === 2 }" class="-mb-px">
                        <!-- Set active class by using :class provided by Alpine -->
                        <a href="#" :class="openTab === 2 ? activeClasses : inactiveClasses"
                            class="inline-block text-xs py-[7px] px-[15px] mt-[2px] font-bold">
                            Rapid Sale
                        </a>
                    </li>
                </ul>
                <div class="w-full bg-white h-full">
                    <div x-show="openTab === 1">

                        <div class="grid-cols-2 grid p-[15px] gap-[38px]">
                            <div class="grid grid-cols-4 gap-[10px]">
                                <div class="shadow-xl col-span-2 h-[101px] bg-[#7556D6] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">0</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-home" style="background-position: -5px -7px;"></i>
                                            <span class="text-sm icons-text">Stock</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl col-span-2 h-[101px] bg-[#7F3979] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-shop-cart "
                                                style="background-position: -43px -7px;"></i>
                                            <span class="text-sm icons-text">Total</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#3FA0EC] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-cart "
                                                style="width: 30px;background-position: -76px -8px;"></i>
                                            <span class="text-sm icons-text">Online</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#1B9CB2] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-cart-gray "
                                                style="width: 30px;background-position: -111px -8px;"></i>
                                            <span class="text-sm icons-text">Offline</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#31aa2d] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center leading-none"
                                            style="margin-top: 10px !important">
                                            <i class="icon icon-hourglass"
                                                style="width:30px;background-position: -148px -8px;">
                                            </i>
                                            <span class="text-sm icons-text ml-1" style="">Expiring Soon</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#2F5998] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-history "
                                                style="background-position: -184px -8px;"></i>
                                            <span class="text-sm icons-text">Expired</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#3b9f3d] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center flex gap-1 items-center"
                                            style="margin-top: 7px !important">
                                            <i class="icon icon-magic flex-none"
                                                style="background-position: -224px -8px;"></i>
                                            <span class="text-sm icons-text">Activated</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#2f61ad] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-target "
                                                style="background-position: -256px -7px;"></i>
                                            <span class="text-sm icons-text">Inactive</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#e96343] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-warning "
                                                style="background-position: -294px -7px;"></i>
                                            <span class="text-sm icons-text leading-none">Alerting Devices</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#2f9bf2] py-[15px]">
                                    <a class="" href="">
                                        <p class="text-center num num-box">2</p>
                                        <div class="icons-text-box text-center" style="margin-top: 7px !important">
                                            <i class="icon icon-heart" style="background-position: -328px -7px;"></i>
                                            <span class="text-sm icons-text">Following</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-[10px]">
                                <div class="shadow-xl h-[101px] bg-[#01AFF0] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-monitor"></i>
                                        <span
                                            class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>Monitor</b></span>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] col-span-2 bg-[#3E5C8A] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-signal"></i>
                                        <span
                                            class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>Report</b></span>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#0086D0] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-enclosure"></i>
                                        <span class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>Geo
                                                Fence</b></span>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#7F3979] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-face-set"></i>
                                        <span
                                            class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>Account</b></span>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#008299] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-router"></i>
                                        <span class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>Device
                                                Management</b></span>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#2770ec] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-note"></i>
                                        <span
                                            class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>Command</b></span>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#0F7B11] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-flag"></i>
                                        <span
                                            class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>POI</b></span>
                                    </a>
                                </div>
                                <div class="shadow-xl h-[101px] bg-[#A34A42] pt-[15px] relative">
                                    <a class="grid" href="/consoleNew" target="_blank">
                                        <i class="icon icon-bell-set"></i>
                                        <span
                                            class="absolute bottom-[5px] left-[10px] text-white text-sm"><b>Alerts</b></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div x-show="openTab === 2">Tab #2</div>
                </div>
            </div>

        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="messages" role="tabpanel"
            aria-labelledby="messages-tab">
            ms
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="va" role="tabpanel"
            aria-labelledby="va-tab">
            va
        </div>
    </div>
</x-app-layout>
<script>
    // var ajax = function(method, url, callback) {
    //     var xhr = new XMLHttpRequest();
    //     xhr.withCredentials = true;
    //     xhr.open(method, url, true);
    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState == 4) {
    //             callback(JSON.parse(xhr.responseText));
    //         }
    //     };
    //     if (method == 'POST') {
    //         xhr.setRequestHeader('Content-type', 'application/json');
    //     }
    //     xhr.send()
    // };
    // ajax('GET', 'api/session', function(session) {
    //     console.log(session);
    //     var socket = new WebSocket("wss://traccar.sentralgps.com/api/socket");

    //     socket.addEventListener("open", function(event) {
    //         console.log("WebSocket connection opened:", event);
    //     });
    // });

    // $.ajax({
    //     url: "https://traccar.sentralgps.com/api/session",
    //     type: "POST",
    //     data: {
    //         email: "admin",
    //         password: "admin"
    //     },
    //     dataType: "json",
    //     success: function(data, textStatus, jqXHR) {
    //         console.log(jqXHR);
    //         // Perintah berhasil
    //         // Cookies dapat diakses melalui jqXHR.getResponseHeader('Set-Cookie')
    //         var cookies = jqXHR.getResponseHeader('Set-Cookie');
    //         console.log("Cookies received:", cookies);
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
    //         // Penanganan kesalahan
    //         console.error("Request failed with status:", jqXHR.status);
    //     }
    // });
    // success: function(sessionResponse) {
    //         console.log(sessionResponse);
    //         var socket = new WebSocket("wss://traccar.sentralgps.com/api/socket");

    //         socket.addEventListener("open", function(event) {
    //             console.log("WebSocket connection opened:", event);
    //         });
    //     },
    //     error: function(error) {
    //         console.error("Failed to authenticate:", error);
    //     }
    // });
</script>
