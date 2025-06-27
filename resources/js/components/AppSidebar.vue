<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import NavRegular from './NavRegular.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Home',
        href: '/dashboard',
        icon: LayoutGrid,
    },
     {
        title: 'Explore',
        href: '/explore',
        icon: BookOpen,
    },

    {
        title: 'Upload',
        href: '/uploada',
        icon: Folder,
    },
   
];
const sideBarItems:NavItem[] = [
  
     {
        title: 'Explore',
        href: '/explore',
        icon: BookOpen,
    },

    {
        title: 'Upload',
        href: '/uploada',
        icon: Folder,
    },
   
];

// Add padding style for the sidebar
const sidebarPadding = 'p-2';




const footerNavItems: NavItem[] = [
    {
        title: 'Starred Repos',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: BookOpen,
    },
    {
        title: 'Saved Files',
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: Folder,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                        <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
            
            <NavRegular :items="sideBarItems" />
        </SidebarContent>
       

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
