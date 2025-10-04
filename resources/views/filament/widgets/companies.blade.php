<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-6">
            <!-- Main Stats Card -->
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" class="rounded-xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-sm font-medium opacity-90">
                            Total Companies
                        </h2>
                        <p class="text-4xl font-bold mt-2">
                            {{ \App\Models\Company::count() }}
                        </p>
                        <div class="mt-3 flex items-center space-x-2 text-sm opacity-90">
                            <x-heroicon-m-arrow-trending-up class="h-4 w-4" />
                            <span>+{{ \App\Models\Company::whereMonth('created_at', now()->month)->count() }} this month</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <x-heroicon-o-building-office-2 class="h-12 w-12 opacity-80" />
                    </div>
                </div>
            </div>

            <!-- Status Breakdown -->
            <div class="grid grid-cols-3 gap-4">
                <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);" class="rounded-lg p-4 text-white shadow-md">
                    <div class="flex items-center">
                        <div class="h-2 w-2 bg-white rounded-full mr-2 opacity-80"></div>
                        <span class="text-sm font-medium opacity-90">Active</span>
                    </div>
                    <p class="text-2xl font-bold mt-1">
                        {{ \App\Models\Company::where('status', 'active')->count() }}
                    </p>
                </div>
                
                <div style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);" class="rounded-lg p-4 text-white shadow-md">
                    <div class="flex items-center">
                        <div class="h-2 w-2 bg-white rounded-full mr-2 opacity-80"></div>
                        <span class="text-sm font-medium opacity-90">Pending</span>
                    </div>
                    <p class="text-2xl font-bold mt-1">
                        {{ \App\Models\Company::where('status', 'pending')->count() }}
                    </p>
                </div>
                
                <div style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);" class="rounded-lg p-4 text-white shadow-md">
                    <div class="flex items-center">
                        <div class="h-2 w-2 bg-white rounded-full mr-2 opacity-80"></div>
                        <span class="text-sm font-medium opacity-90">Inactive</span>
                    </div>
                    <p class="text-2xl font-bold mt-1">
                        {{ \App\Models\Company::where('status', 'inactive')->count() }}
                    </p>
                </div>
            </div>

            <!-- Recent Companies -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Recent Companies</h3>
                <div class="space-y-2">
                    @foreach(\App\Models\Company::latest()->take(3)->get() as $company)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex items-center space-x-3">
                                <div style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);" class="h-8 w-8 rounded-lg flex items-center justify-center text-white text-sm font-semibold shadow-sm">
                                    {{ strtoupper(substr($company->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $company->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $company->industry ?? 'No industry' }}</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $company->status === 'active' ? 'bg-green-100 text-green-800' : 
                                   ($company->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($company->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
