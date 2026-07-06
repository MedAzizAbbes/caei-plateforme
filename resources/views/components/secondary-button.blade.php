<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-md border border-slate-300 bg-white px-5 py-2.5 text-xs font-black uppercase text-[#061743] shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-[#ffbd45] focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
