<x-layout>
    <div class="max-w-full-custom border border-wgg-border">

        @guest
            <div class="bg-white overflow-hidden space-y-4">
                <div class="p-10 space-y-2">
                    <h2 class="heading-1">Welcome to WeClaims</h2>
                    <span class="status-badge bg-red-100 text-red-800">Not Logged In</span>
                    <p class="text-wgg-black-500 text-sm mb-6">Please log in to access your claims dashboard and submit new claims.</p>
                </div>
            </div>
        @endguest

        @auth
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-10 space-y-8">

                    <h2 class="heading-1">Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>

                    <!-- Claim Statistics -->
                    <div class="space-y-4">
                        <h3 class="heading-2">Personal Claim Overview</h3>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                            @php
                                $totalClaims = \App\Models\Claim::where('user_id', auth()->id())->count();
                                $approvedClaims = \App\Models\Claim::where('user_id', auth()->id())->where('status', 'approved')->count();
                                $pendingClaims = \App\Models\Claim::where('user_id', auth()->id())->where('status', 'pending')->count();
                                $rejectedClaims = \App\Models\Claim::where('user_id', auth()->id())->where('status', 'rejected')->count();
                            @endphp
                            <div class="bg-white p-6 rounded-lg border border-gray-200 transition-all duration-300 hover:shadow-md">
                                <p class="text-sm font-medium text-gray-500 mb-2">Total Claims</p>
                                <p class="text-3xl font-bold text-blue-600">{{ $totalClaims }}</p>
                            </div>
                            <div class="bg-white p-6 rounded-lg border border-gray-200 transition-all duration-300 hover:shadow-md">
                                <p class="text-sm font-medium text-gray-500 mb-2">Approved</p>
                                <p class="text-3xl font-bold text-green-600">{{ $approvedClaims }}</p>
                            </div>
                            <div class="bg-white p-6 rounded-lg border border-gray-200 transition-all duration-300 hover:shadow-md">
                                <p class="text-sm font-medium text-gray-500 mb-2">Pending</p>
                                <p class="text-3xl font-bold text-yellow-600">{{ $pendingClaims }}</p>
                            </div>
                            <div class="bg-white p-6 rounded-lg border border-gray-200 transition-all duration-300 hover:shadow-md">
                                <p class="text-sm font-medium text-gray-500 mb-2">Rejected</p>
                                <p class="text-3xl font-bold text-red-600">{{ $rejectedClaims }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="space-y-4">
                        <h3 class="heading-2">Quick Actions</h3>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('claims.new') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-300">
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                New Claim
                            </a>
                            <a href="{{ route('claims.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-300">
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                View All Claims
                            </a>
                        </div>
                    </div>

                    <!-- Update Changelog -->
                    <div class="space-y-4">
                        <h3 class="heading-2">Recent Updates</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-y-2">
                                <div class="flex-shrink-0">
                                    <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-wgg-black-700">New feature: Bulk claim submission</p>
                                    <p class="text-xs text-wgg-black-400">Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                            <div class="flex items-center space-y-2">
                                <div class="flex-shrink-0">
                                    <div class="h-4 w-4 rounded-full bg-green-500"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-wgg-black-700">Performance improvement</p>
                                    <p class="mt-1 text-sm text-wgg-black-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem nisi in facere alias, iste dolores..</p>
                                </div>
                            </div>
                            <div class="flex items-center space-y-2">
                                <div class="flex-shrink-0">
                                    <div class="h-4 w-4 rounded-full bg-yellow-500"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-wgg-black-700">UI enhancement</p>
                                    <p class="mt-1 text-sm text-wgg-black-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium, molestias.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

    </div>
</x-layout>