@props(['topic'])

<span {{ $attributes->class(['lesson-icon', $topic['color']]) }} aria-hidden="true">{{ $topic['icon'] }}</span>
