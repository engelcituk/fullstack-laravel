<script>
export default {
    name: 'DashboardStats'
}
</script>

<script setup>
import useComponentsLoader from "@/composables/useComponentsLoader.js";

const props = defineProps({
    stats: {
        type: Array,
        required: true
    }
})

const { findComponentsByName, components, statsLoader  } = useComponentsLoader()
const loadedComponents = components( props.stats, statsLoader )
</script>


<template>
    <component
        v-for="stat in stats"
        :key="stat.id"
        :is="findComponentsByName(stat.component, loadedComponents)"
        v-bind="stat"
    />
</template>
