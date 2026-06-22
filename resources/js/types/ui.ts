export type Appearance = 'light' | 'dark' | 'system';
export type ResolvedAppearance = 'light' | 'dark';

export type AppVariant = 'header' | 'sidebar' | 'client';

export type FlashToast = {
    type: 'success' | 'info' | 'warning' | 'error';
    message: string;
};
