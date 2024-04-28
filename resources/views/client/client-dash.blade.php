<div>
    <div x-data="{ openTab: null }">
        <!-- Accordion Item 1 -->
        <div class="border rounded mb-2">
            <!-- Accordion Header 1 -->
                <button @click="openTab === 1 ? openTab = null : openTab = 1" class="w-full px-4 py-2 bg-gray-200 text-left">
            Start the case
            </button>
            <!-- Accordion Content 1 -->
            <div x-show="openTab === 1" class="p-4">
                @include('client.client-case-form')
            </div>
        </div> 
    </div>
@isset($legalCases)

    <div x-data="{ openTab: null }">
                <!-- Accordion Item 2 -->
        <div class="border rounded mb-2">
                <!-- Accordion Header 2 -->
                    <button @click="openTab === 2 ? openTab = null : openTab = 2" class="w-full px-4 py-2 bg-gray-200 text-left">
                        Overview
                    </button>
                <!-- Accordion Content 2 -->
                <div x-show="openTab === 2" class="p-4">
                    @include('legal_case.overview')
                </div>
            </div>
    </div>        

@endisset
    <div x-data="{ openTab: null }">
                <!-- Accordion Item 3 -->
        <div class="border rounded mb-3">
                <!-- Accordion Header 3 -->
                    <button @click="openTab === 3 ? openTab = null : openTab = 3" class="w-full px-4 py-2 bg-gray-200 text-left">
                Meeting 
                </button>
                <!-- Accordion Content 3 -->
                <div x-show="openTab === 3" class="p-4">
                    
                </div>
            </div>
    </div>        
</div>