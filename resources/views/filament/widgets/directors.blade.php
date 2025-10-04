<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-6">
            <!-- Header Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div style="background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);" class="rounded-xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium opacity-90">Total Directors</h3>
                            <p class="text-3xl font-bold">{{ $this->getViewData()['totalDirectors'] }}</p>
                        </div>
                        <x-heroicon-o-users class="h-10 w-10 opacity-80" />
                    </div>
                </div>
                
                <div style="background: linear-gradient(135deg, #10b981 0%, #047857 100%);" class="rounded-xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium opacity-90">New This Month</h3>
                            <p class="text-3xl font-bold">{{ $this->getViewData()['newDirectorsThisMonth'] }}</p>
                        </div>
                        <x-heroicon-o-plus-circle class="h-10 w-10 opacity-80" />
                    </div>
                </div>
            </div>

            <!-- Recent Directors -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Directors</h3>
                <div class="space-y-3">
                    @forelse($this->getViewData()['recentDirectors'] as $director)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex items-center space-x-3">
                                <div style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);" class="h-10 w-10 rounded-full flex items-center justify-center text-white font-semibold shadow-sm">
                                    {{ strtoupper(substr($director->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $director->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $director->company->name ?? 'No Company' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">{{ $director->created_at->diffForHumans() }}</p>
                                <p class="text-xs text-gray-400">{{ $director->email }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-500">
                            <x-heroicon-o-user-group class="h-12 w-12 mx-auto mb-2 opacity-50" />
                            <p>No directors found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
