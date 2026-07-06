@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-md border-slate-300 shadow-sm focus:border-[#ffbd45] focus:ring-[#ffbd45]']) }}>
