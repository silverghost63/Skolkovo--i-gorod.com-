<?php
	$headers = unserialize(base64_decode('YTo0OntpOjA7czoyMzoiWC1Qb3dlcmVkLUJ5OiBQSFAvNS4yLjYiO2k6MTtzOjM4OiJFeHBpcmVzOiBUaHUsIDE5IE5vdiAxOTgxIDA4OjUyOjAwIEdNVCI7aToyO3M6Nzc6IkNhY2hlLUNvbnRyb2w6IG5vLXN0b3JlLCBuby1jYWNoZSwgbXVzdC1yZXZhbGlkYXRlLCBwb3N0LWNoZWNrPTAsIHByZS1jaGVjaz0wIjtpOjM7czoxNjoiUHJhZ21hOiBuby1jYWNoZSI7fQ=='));
	$session = unserialize(base64_decode('YToxNjp7czo3OiJ1c2VyX2lkIjtzOjQ6IjIzNzMiO3M6ODoiaXNfYWRtaW4iO2E6MTp7aToyMzczO2I6MDt9czoxOToib2xkX2xvZ2dlZF9pbl92YWx1ZSI7YjowO3M6NDoic3RhdCI7YTo4OntzOjExOiJpc1NlYXJjaEJvdCI7YjowO3M6MjoiaWQiO3M6MzI6ImZmMjQ3N2I0NjkyZGM4ZDE4NjhlMjQzYjYwYzlkZmMzIjtzOjc6InNpdGVfaWQiO3M6MToiMSI7czo3OiJ1c2VyX2lkIjtpOjM2MTk7czo3OiJwYXRoX2lkIjtpOjQxMjU7czoxNDoibnVtYmVyX2luX3BhdGgiO2k6MTM7czoxMjoibGFzdF9wYWdlX2lkIjtzOjM6IjEwNCI7czoxMjoicHJldl9wYWdlX2lkIjtzOjM6IjEwNCI7fXM6MzI6ImFiOGU3MDkzY2Q3YjUwYWQ2YTg4OWQ2MzJkZTVhZmI1IjthOjk6e2k6MDthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiODYiO31pOjE7YTozOntpOjA7czo0OiJuZXdzIjtpOjE7czo0OiJpdGVtIjtpOjI7aToxNTI7fWk6MjthOjM6e2k6MDtzOjQ6Im5ld3MiO2k6MTtzOjQ6Iml0ZW0iO2k6MjtpOjE0OTt9aTozO2E6Mzp7aTowO3M6NDoibmV3cyI7aToxO3M6NDoiaXRlbSI7aToyO2k6MTUxO31pOjQ7YTozOntpOjA7czo0OiJuZXdzIjtpOjE7czo0OiJpdGVtIjtpOjI7aToxNTM7fWk6NTthOjM6e2k6MDtzOjQ6Im5ld3MiO2k6MTtzOjQ6Iml0ZW0iO2k6MjtpOjE0Mzt9aTo2O2E6Mzp7aTowO3M6NDoibmV3cyI7aToxO3M6NDoiaXRlbSI7aToyO2k6MjA7fWk6NzthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiMTYiO31pOjg7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjI6IjIzIjt9fXM6MjQ6InNlc3Npb24tY3Jvc3Nkb21haW4tc3luYyI7aToxO3M6MzI6IjM1OGJmYzQyYjNiNWRmMGQyNWNjMTU0OGQwNzNjMzMxIjthOjM6e2k6MDthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MToiOCI7fWk6MTthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiMTYiO31pOjI7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjI6IjIzIjt9fXM6MzI6ImIwODU1ODYwNjhmOTcxZmU3NzllNjE1ZTVjMGM5ODA2IjthOjM6e2k6MDthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MzoiMTMxIjt9aToxO2E6Mzp7aTowO3M6NzoiY29udGVudCI7aToxO3M6MDoiIjtpOjI7czoyOiIxNiI7fWk6MjthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiMjMiO319czoxMToidW1pX2NhcHRjaGEiO3M6MzI6IjdkMjZmYjQ4MjdiODExZWQ5ZTg2NTdmMmU5NjhmZjQ4IjtzOjE3OiJ1bWlfY2FwdGNoYV9wbGFpbiI7czo2OiJuaXdwazUiO3M6MzI6ImM1MDhiZTg2OGIwMmIyMWE3ZTEyOGVhZGFiOGNkZjgzIjthOjM6e2k6MDthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MzoiMTQyIjt9aToxO2E6Mzp7aTowO3M6NzoiY29udGVudCI7aToxO3M6MDoiIjtpOjI7czoyOiIxNiI7fWk6MjthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiMjMiO319czozMjoiYzZiMWNjM2IxZGRlNzA0YzBkOWY0ODkxM2JiMDU5NWUiO2E6Mzp7aTowO2E6Mzp7aTowO3M6NzoiY29udGVudCI7aToxO3M6MDoiIjtpOjI7czozOiIxNDEiO31pOjE7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjI6IjE2Ijt9aToyO2E6Mzp7aTowO3M6NzoiY29udGVudCI7aToxO3M6MDoiIjtpOjI7czoyOiIyMyI7fX1zOjMyOiJhOTNkY2NmYjlmMDFlZmU2YWFjNWFjYjFlYWZjNTA4OCI7YTozOntpOjA7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjM6IjE0MCI7fWk6MTthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiMTYiO31pOjI7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjI6IjIzIjt9fXM6MzI6ImQ4OWJkMjJiM2NlY2RiMmM2Nzk4MGJjNjRmNGYwZjMxIjthOjM6e2k6MDthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MzoiMTM5Ijt9aToxO2E6Mzp7aTowO3M6NzoiY29udGVudCI7aToxO3M6MDoiIjtpOjI7czoyOiIxNiI7fWk6MjthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiMjMiO319czozMjoiOGZjYzU2YmU5OTIzZmYwZGYxZmM2ZWZjNDE3ZDIyY2EiO2E6Mzp7aTowO2E6Mzp7aTowO3M6NzoiY29udGVudCI7aToxO3M6MDoiIjtpOjI7czozOiIxMzgiO31pOjE7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjI6IjE2Ijt9aToyO2E6Mzp7aTowO3M6NzoiY29udGVudCI7aToxO3M6MDoiIjtpOjI7czoyOiIyMyI7fX1zOjMyOiJjNzk2MTc0ZjBiNTU0Y2Y4NDE0MThmNTZjMjExZTgzNyI7YTozOntpOjA7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjM6IjEzNyI7fWk6MTthOjM6e2k6MDtzOjc6ImNvbnRlbnQiO2k6MTtzOjA6IiI7aToyO3M6MjoiMTYiO31pOjI7YTozOntpOjA7czo3OiJjb250ZW50IjtpOjE7czowOiIiO2k6MjtzOjI6IjIzIjt9fX0='));
	
	if(is_array($headers)) {
		$cmp = strtolower("Set-Cookie");
		
		for($i = 0; $i < sizeof($headers); $i++) {
			if(substr(strtolower($headers[$i]), 0, strlen($cmp)) == $cmp) {
				continue;
			} else {
				header($headers[$i]);
			}
		}
	}
	if (!session_id()) session_start();
	$_SESSION = $session;
?>