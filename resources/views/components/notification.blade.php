<div x-cloak x-data="{ notification: { isOpen: false, type: '', message: '' } }" x-init="
    @if(session('notificationMessage'))
        notification.isOpen = true;
        notification.type = '{{ session('notificationType') }}';
        notification.message = '{{ session('notificationMessage') }}';
        setTimeout(() => notification.isOpen = false, 5000);
    @endif
">
    <!-- Global notification live region, render this permanently at the end of the document -->
    <div aria-live="assertive" x-show="notification.isOpen" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <!-- Notification panel -->
            <div x-show.transition.duration.300ms="notification.isOpen" @click.away="notification.isOpen = false"
                 class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg
            ring-1 ring-black ring-opacity-5 p-2"
                 x-bind:class="{
         'bg-green-50': notification.type === 'success',
         'bg-red-50': notification.type === 'danger',
         'bg-blue-50': notification.type === 'info',
         'border-yellow-400 bg-yellow-50': notification.type === 'warning',
         'bg-white': notification.type !== 'success' && notification.type !== 'danger' && notification.type !== 'info' && notification.type !== 'warning'
     }">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <template x-if="notification.type === 'success'">
                                <!-- Success icon -->
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                            </template>
                            <template x-if="notification.type === 'danger'">
                                <!-- Delete icon -->
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                </svg>
                            </template>
                            <template x-if="notification.type === 'info'">
                                <!-- Info icon -->
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                                </svg>
                            </template>
                            <template x-if="notification.type === 'warning'">
                                <!-- Info icon -->
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                            </template>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900" x-text="notification.message"></p>
                            <template x-if="notification.type === 'warning'">
                            <a href="
                            @if(request()->routeIs('tenants.index'))
                             {{ route('rooms.create') }}
                            @elseif(request()->routeIs('rooms.index'))
                              {{ route('shared-apartments.create') }}
                            @elseif(request()->routeIs('shared-apartments.index'))
                              {{ route('residential-communities.create') }}
                           @endif" class="font-medium text-yellow-700 underline hover:text-yellow-600">{{ trans('language.notifications.create') }}</a>
                            </template>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button @click="notification.isOpen = false" type="button"
                                    class="inline-flex rounded-md
               "
                                    x-bind:class="{
            'bg-green-50 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50': notification.type === 'success',
            'bg-blue-50 text-blue-700 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-blue-50': notification.type === 'info',
            'bg-red-50 text-red-800 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 focus:ring-offset-red-50': notification.type === 'danger',
            'bg-yellow-50 text-yellow-700 hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 focus:ring-offset-yellow-50': notification.type === 'warning',
            'bg-white': notification.type !== 'success' && notification.type !== 'danger' && notification.type !== 'info' && notification.type !== 'warning'
        }">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
