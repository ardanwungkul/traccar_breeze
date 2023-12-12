<x-app-layout>
    <x-slot name="header">
        <div class=" min-h-[88vh] w-[300px] border-r border-gray-300 bg-white">
            <div style="background-image: linear-gradient(#F1F5FD, #E9F0FF); background-color: aliceblue; border-bottom: 1px solid #ddd"
                class="px-[15px] py-1">
                <p class="text-sm font-bold text-[#333333] leading-loose">Account</p>
            </div>
            <div class="bg-white w-full">
                <div id="myTabContent">
                    <div class="" id="account" role="tabpanel" aria-labelledby="account-tab">

                        <div class="border-b bg-[aliceblue]" x-data="{
                            openTab: 1,
                            activeClasses: 'border-[1px] border-gray-300 border-b-0 rounded-t text-[#666666] bg-white',
                            inactiveClasses: 'text-[#666666]'
                        }" class="p-6">
                            <ul class="flex border-b px-[15px] pt-[3px]">
                                <li @click="openTab = 1" :class="{ '': openTab === 1 }" class="-mb-px ">
                                    <a href="#" :class="openTab === 1 ? activeClasses : inactiveClasses"
                                        class="inline-block text-xs py-[7px] px-[15px] mt-[2px] font-bold">
                                        All
                                    </a>
                                </li>
                                <li @click="openTab = 2" :class="{ '': openTab === 2 }" class="-mb-px">
                                    <a href="#" :class="openTab === 2 ? activeClasses : inactiveClasses"
                                        class="inline-block text-xs py-[7px] px-[15px] mt-[2px] font-bold">
                                        Expiration
                                    </a>
                                </li>
                            </ul>
                            <div class="w-full bg-white h-full">
                                <div x-show="openTab === 1">
                                    @include('components.tree.user')
                                </div>
                                <div x-show="openTab === 2">Tab #2</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </x-slot>
    <div class="ml-[40px] ">
        <div class="bg-white">
            <div class=" px-[15px] py-1"
                style="background-image: linear-gradient(#F1F5FD, #E9F0FF); background-color: aliceblue; border-bottom: 1px solid #ddd">
                <p class="text-sm font-bold text-[#333333] leading-loose">All Devices</p>
            </div>
            <div class="p-[15px]">
                <button data-modal-target="addDevice" data-modal-toggle="addDevice"
                    class="bg-[#0087d6] mx-auto px-3 py-1 rounded-md text-sm text-white">
                    Add Devices
                </button>
            </div>
            <x-modal.add.addDevices :session="$session" :users="$users"></x-modal.add.addDevices>
            <div class="overflow-hidden px-[15px] w-full">
                <table id="userTable" style="width: 100% !important">
                    <thead>
                        <tr class="text-sm font-extrabold">
                            <th>No</th>
                            <th>Account</th>
                            <th>Device Name</th>
                            <th>IMEI</th>
                            <th>Model</th>
                            <th>SIM</th>
                            <th>Expired Date(U)</th>
                            <th>Status</th>
                            <th>Group</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    $(document).ready(function() {
        var userTable = $('#userTable').DataTable({
            info: false,
            paging: false,
            scrollX: "100%",
            processing: true,
            columnDefs: [{
                width: "100px",
                targets: 2
            }],
            columns: [{
                    data: 'rowNumber',
                    render: function(data) {
                        return '<p class="text-center">' + data +
                            '</p>'
                    }
                },
                {
                    data: 'userName'
                },
                {
                    data: 'name'
                },
                {
                    data: 'uniqueId'
                },
                {
                    data: 'model'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'expirationDate'
                },
                {
                    data: 'status'
                },
                {
                    data: 'groupId'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    render: function(data) {
                        return `
                        <div class="flex items-center justify-center gap-2">
                            <button data-device-id="${data}" class="editDevice ">
                                <i class="fa-solid fa-pen text-blue-400 text-sm"></i>
                            </button>
                            <button data-device-id="${data}" class="deleteDevice ">
                                <i class="fa-solid fa-trash-can text-blue-400 text-sm"></i>
                            </button>
                        </div>`;
                    }
                }

            ]
        });

        function fetchData(userId, userName) {
            $.ajax({
                url: '/api/devices/user/' + userId,
                method: 'GET',
                success: function(data) {
                    userTable.clear().draw();

                    data.forEach(function(item, index) {
                        var rowNumber = index + 1;
                        var formattedDate = item.expirationTime ? new Date(item
                            .expirationTime).toLocaleDateString() : '';
                        userTable.row.add({
                            'rowNumber': rowNumber,
                            'userName': userName,
                            'name': item.name,
                            'uniqueId': item.uniqueId,
                            'model': item.model,
                            'phone': item.phone,
                            'expirationDate': formattedDate,
                            'status': item.status,
                            'groupId': item.groupId,
                            'actions': item.id
                        }).draw(false);
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        $('body').on('click', '.deleteDevice', function() {
            var id = $(this).data("device-id");
            $.ajax({
                type: "DELETE",
                url: "/device/" + id,
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    fetchData(userId, userName);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        var selectedRadio = $('input[name="user_radio"]:checked');
        var userId = selectedRadio.data('id');
        var userName = selectedRadio.data('name');

        fetchData(userId, userName);

        $('input[name="user_radio"]').change(function() {
            if ($(this).is(":checked")) {
                userId = $(this).data('id');
                userName = $(this).data('name');
                fetchData(userId, userName);
            }
        });
    });
</script>
