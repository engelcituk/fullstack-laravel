<script>
export default {
    name: 'DashboardPage',
}
</script>

<script setup>
import DataProvider from '@/providers/DataProvider'
import useDataProvider from '@/composables/useDataProvider'
import { AppSpinner } from '@/components/ui'
import { HorizontalDivider } from '@/components/ui/dividers'
import { StatsTemplate } from '@/components/templates'
import { DashboardStats } from '@/components/backoffice/dashboard'
import { UserInfo } from '@/components/backoffice'

defineProps({
    jsonUrl:{
        type: 'string',
        required: true,
    },
})

const { dataProviderKey } = useDataProvider()

</script>

<template>
    <DataProvider
        :provider-key="dataProviderKey"
        :url="jsonUrl"
    >
        <template v-slot="loading, error, data">
            <AppSpinner v-if="loading"/>
            
            <template v-if="!loading && !error">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="min-w-0 flex-1">
                        <UserInfo :user="data?.user" />
                    </div>
                </div>

                <HorizontalDivider/>

                <StatsTemplate>
                    <DashboardStats :stats="data?.stats" />
                </StatsTemplate>

            </template>
        </template>
    </DataProvider>
</template>
