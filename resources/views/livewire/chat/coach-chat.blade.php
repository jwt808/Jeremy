<!-- resources/views/livewire/chat/coach-chat.blade.php -->

<div class="flex flex-col h-full">
    <!-- Coach Selection -->
    <div class="mb-4 flex justify-end mt-2 mr-2">
        <select wire:model="coachType" class="border border-gray-300 dark:border-gray-700 rounded-md p-2 pr-7 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white">
            <option value="mental_health">Mental Health</option>
            <option value="career">Career</option>
            <option value="wellness">Wellness</option>
            <!-- Add more coach types as needed -->
        </select>
    </div>

    <!-- Chat Messages -->
    <div class="flex-1 overflow-y-auto p-4 space-y-4">
        @foreach($messages as $message)
            @if($message['role'] === 'assistant')
                <div class="flex">
                    <img src="{{ asset('images/assistant-avatar.jpg') }}" alt="Assistant" class="h-10 w-10 rounded-full">
                    <div class="ml-3 bg-gray-200 dark:bg-gray-700 rounded-lg p-4">
                        @markdown($message['content'])
                    </div>
                </div>
            @else
                <div class="flex justify-end">
                    <div class="mr-3 bg-blue-600 text-white rounded-lg p-4">
                        <p>{{ $message['content'] }}</p>
                    </div>
                    <img src="{{ asset('images/user-avatar.jpg') }}" alt="User" class="h-10 w-10 rounded-full">
                </div>
            @endif
        @endforeach

        <!-- Loading Indicator -->
        <div wire:loading.flex class="justify-center items-center">
            <svg class="animate-spin h-5 w-5 text-blue-600" aria-hidden="true" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="white"/>
            </svg>
        </div>
    </div>

    <!-- Chat Input -->
    <div class="p-4 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center">
            <textarea wire:model.defer="inputMessage" wire:keydown.enter.prevent="sendMessage" class="flex-1 border border-gray-300 dark:border-gray-600 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white" rows="1" placeholder="Type your message..."></textarea>
            <button wire:click="sendMessage" class="ml-2 bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-500 focus:outline-none">
                <span>
                    <svg class="h-5 w-5 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="m2.6 13.083 3.452 1.511L16 9.167l-6 7 8.6 3.916a1 1 0 0 0 1.399-.85l1-15a1.002 1.002 0 0 0-1.424-.972l-17 8a1.002 1.002 0 0 0 .025 1.822zM8 22.167l4.776-2.316L8 17.623z"></path></svg>
                </span> 
            </button>
        </div>
    </div>
</div>
