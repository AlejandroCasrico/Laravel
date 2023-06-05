@include('section.header')
<div class="flex flex-col">
        <div class="flex">
        </div>
        <div class="bg-white text-white p-12 border-gray-700 mt-4">
            <h3 class="text-black text-center text-2xl underline">Reports</h3>
            @include('reportes')
        </div>

    <div class="bg-white text-white p-12 border-gray-700  ">
        <h3 class="text-black text-center text-2xl underline">User administration</h3>
        @include('lista')
    </div>
</div>
