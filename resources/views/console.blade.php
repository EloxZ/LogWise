<div class="console-container flex flex-col">
    <div class="console-title flex justify-between pt-2">
        <div class="ml-3 text-emerald-400">> LogWise</div>
        <div class="text-xl">Console</div>
        <div class="mr-5 text-2xl">
            <span class="text-lime-500">●</span>
            <span class="text-yellow-500">●</span>
            <span class="text-red-500">●</span>
        </div>
    </div>
    <div class="console-filter mx-6 mt-4 flex justify-between gap-4">
        @if($hasToken) 
            <div class="flex gap-2 flex-wrap w-fit h-fit">
                <input type="text" id="labelFilter" name="labelFilter" placeholder="Label">
                <input type="text" id="senderFilter" name="senderFilter" placeholder="Sender">
                <input type="text" id="contextFilter" name="contextFilter" placeholder="Context">
                <input type="text" id="messageFilter" name="messageFilter" placeholder="Message">
            </div>
            <div class="flex gap-2 flex-wrap w-full max-w-36 h-fit justify-end">
                
                <!--<input type="date" id="dayFilter" name="dayFilter">
                <div class="flex gap-2">
                    <input type="time" id="timeFilter" name="timeFilter" step=1>
                    <button class="text-2xl">🧹</button>
                </div>-->
                <form method="GET" action="{{ url()->current() }}">
                    @foreach(request()->query() as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                    <button class="text-2xl">⟳</button>
                </form>
            </div>
        @else
            <form method="GET" action="{{ route('dashboard.index') }}">
                <div class="flex gap-2 h-fit">
                    <input type="text" id="tokenInput" name="token" placeholder="Token">
                    <input type="text" id="limitInput" name="limit" placeholder="Limit">
                    <button id="submitTokenButton">Enter</button>
                </div>
            </form>
        @endif
    </div>
    <ul class="console-logs p-4">
        @foreach($logs as $log)
            <li class="label-{{ strtolower($log->label) }}"
                label="{{ strtolower($log->label) }}"
                sender="{{ strtolower($log->sender) }}"
                context="{{ strtolower($log->context) }}"
                message="{{ strtolower($log->message) }}"
            >
                {{ $log->toString() }}
            </li>
        @endforeach
    </ul>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const labelInput = document.getElementById('labelFilter');
        const senderInput = document.getElementById('senderFilter');
        const contextInput = document.getElementById('contextFilter');
        const messageInput = document.getElementById('messageFilter');
        const dayInput = document.getElementById('dayFilter');
        const timeInput = document.getElementById('timeFilter');

        const logs = document.querySelectorAll('.console-logs li');

        function applyFilters() {
            const label = labelInput.value.toLowerCase();
            const sender = senderInput.value.toLowerCase();
            const context = contextInput.value.toLowerCase();
            const message = messageInput.value.toLowerCase();

            logs.forEach(function(log) {
                const logLabel = log.getAttribute('label');
                const logSender = log.getAttribute('sender');
                const logContext = log.getAttribute('context');
                const logMessage = log.getAttribute('message');

                const showLog = logLabel.includes(label) &&
                                logSender.includes(sender) &&
                                logContext.includes(context) &&
                                logMessage.includes(message);

                log.style.display = showLog ? 'block' : 'none';
            });
        }

        labelInput.addEventListener('input', applyFilters);
        senderInput.addEventListener('input', applyFilters);
        contextInput.addEventListener('input', applyFilters);
        messageInput.addEventListener('input', applyFilters);
    });
</script>

