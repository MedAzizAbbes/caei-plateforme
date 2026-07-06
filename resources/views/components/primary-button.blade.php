<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-md border border-transparent bg-[#ffbd45] px-5 py-2.5 text-xs font-black uppercase text-[#061743] hover:bg-[#ffd071] focus:outline-none focus:ring-2 focus:ring-[#ffbd45] focus:ring-offset-2 active:bg-[#f2a90f] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
