# Project TODO

---

## User Account
- [x] Base auth (login, register, logout)
- [ ] Advanced registration with **email verification**
- [ ] Password reset functionality
- [x] Password update (account settings)
- [ ] Account deletion (GDPR/UX)

---

## User Dashboard
- [ ] User dashboard UI (overview: links, stats)
- [ ] Link listing with click/view counts
- [ ] Edit/Delete links
- [ ] Export links (CSV)
- [ ] Pagination and search for links

---

## Admin Features
- [ ] Admin dashboard UI
- [ ] User management (ban, upgrade/downgrade plan)
- [ ] View all links + stats
- [ ] Flagged/abusive link reporting
- [ ] Admin analytics (users, usage trends)

---

## Analytics
- [x] Views tracking
- [ ] Real-time click tracking (JS ping or image pixel fallback)
- [ ] Location / country tracking (geo IP)
- [ ] Device and browser breakdown (via User-Agent parsing)
- [ ] Graphs/charts for link performance (Chart.js/Recharts)

---

## Plans / Payments
- [ ] Plan management logic (`free`, `pro`, `premium`)
- [x] Plan-based link options (custom slug, UUIDs)
- [ ] Subscription system (Stripe or Paddle)
- [ ] Auto-upgrade/downgrade hooks
- [ ] Plan-based limits (e.g., custom slugs, dashboard)

---

## User Experience
- [x] Login with Discord
- [x] Guest homepage with feature grid and plan cards
- [x] Blade component layout (`layouts.app`)
- [ ] Rate limiting or spam protection (per IP or user)
- [ ] 404 & fallback shortlink redirect page
- [ ] Branding and favicon for shortlink domain
- [ ] Public link preview/meta tag parser
- [ ] QR code generation for each link

---

## Testing & Security
- [ ] Audit logging (admin actions, dangerous actions)
