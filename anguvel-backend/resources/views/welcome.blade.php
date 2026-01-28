@php
    // Filtramos las rutas que empiecen con 'api/'
    $routes = collect(Route::getRoutes())->filter(function($route) {
        return str_starts_with($route->uri, 'api/');
    });
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anguvel API | Docs</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        /* === 1. VARIABLES Y BASE === */
        :root {
            --font-main: 'Instrument Sans', sans-serif;
            --bg-light: #f8fafc;
            --bg-dark: #0f172a;
            --card-light: #ffffff;
            --card-dark: #1e293b;
        }

        body { 
            font-family: var(--font-main); 
            background-color: var(--bg-light);
            transition: background-color 0.3s ease;
        }

        @media (prefers-color-scheme: dark) {
            body { background-color: var(--bg-dark); }
        }

        /* === 2. BADGES DE MÉTODOS === */
        .method-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 0.5rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 800;
            border: 1px solid transparent;
        }

        .m-get    { background: #ecfdf5; color: #059669; border-color: #10b98133; }
        .m-post   { background: #eff6ff; color: #2563eb; border-color: #3b82f633; }
        .m-put    { background: #fffbeb; color: #d97706; border-color: #f59e0b33; }
        .m-delete { background: #fef2f2; color: #dc2626; border-color: #ef444433; }

        @media (prefers-color-scheme: dark) {
            .m-get    { background: #064e3b33; color: #34d399; }
            .m-post   { background: #1e3a8a33; color: #60a5fa; }
            .m-put    { background: #78350f33; color: #fbbf24; }
            .m-delete { background: #7f1d1d33; color: #f87171; }
        }

        /* === 3. TABLA Y COMPONENTES === */
        .api-card {
            background: var(--card-light);
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .endpoint-code {
            font-family: monospace;
            font-size: 0.85rem;
            color: #e11d48;
            background: #fff1f2;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
        }

        @media (prefers-color-scheme: dark) {
            .api-card { background: var(--card-dark); border-color: #334155; }
            .endpoint-code { background: #88133733; color: #fb7185; }
        }

        .table-row:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }
        @media (prefers-color-scheme: dark) {
            .table-row:hover { background-color: rgba(255, 255, 255, 0.02); }
        }
    </style>
</head>

<body class="text-slate-800 dark:text-slate-200">

    <div class="max-w-5xl mx-auto px-6 py-12">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight">Anguvel<span class="text-rose-600">.io</span></h1>
                <p class="text-slate-500 text-sm mt-1 uppercase tracking-widest font-medium">Developer API Explorer</p>
            </div>
            <div class="flex items-center bg-white dark:bg-slate-800 px-4 py-2 rounded-lg border dark:border-slate-700 shadow-sm">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                <span class="text-xs font-bold uppercase">Status: Online</span>
            </div>
        </div>

        <div class="api-card rounded-2xl overflow-hidden">
            <div class="p-6 border-b dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                <h2 class="font-bold text-lg">Endpoints Registrados</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="text-left bg-slate-50 dark:bg-slate-800/30">
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase">Method</th>
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase">Route Path</th>
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase hidden sm:table-cell">Handler</th>
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase text-right">Middleware</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-slate-700">
                        @forelse($routes as $route)
                            <tr class="table-row transition-all">
                                <td class="p-4">
                                    @foreach($route->methods as $method)
                                        @if($method !== 'HEAD')
                                            <span class="method-badge m-{{ strtolower($method) }}">{{ $method }}</span>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="p-4">
                                    <span class="endpoint-code">/{{ $route->uri }}</span>
                                </td>
                                <td class="p-4 hidden sm:table-cell">
                                    <span class="text-xs font-mono text-slate-500 italic">
                                        {{ str_replace('App\\Http\\Controllers\\', '', (string)$route->getActionName()) }}
                                    </span>
                                </td>
                                <td class="p-4 text-right text-[10px] font-bold text-slate-400 uppercase">
                                    {{ implode(', ', $route->middleware()) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-16 text-center italic text-slate-400">
                                    No se encontraron rutas en el prefijo api/
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">
                &copy; {{ date('Y') }} Anguvel System Architecture
            </p>
        </div>
    </div>

</body>
</html>