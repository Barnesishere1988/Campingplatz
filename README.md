# Lehrabschlussprüfung – Entwicklung einer Webanwendung

Prüfungsaufgabe Nr. 5

## Aufgabe: Reservierungsverwaltung eines Campingplatzes

6 Stunden

Schwierigkeitsgrad: Mittel

Ein kleiner Campingplatz verfügt über mehrere Stellplätze für Wohnmobile, Wohnwagen und Zelte. Die Reservierungen werden derzeit telefonisch entgegengenommen und in einem Kalender auf Papier eingetragen.

Dadurch kommt es gelegentlich zu Doppelbuchungen. Außerdem ist es für die Mitarbeiter schwierig, freie Stellplätze zu finden und den Überblick über bevorstehende Anreisen zu behalten.

Der Campingplatz möchte deshalb eine Webanwendung, mit der Stellplätze und Reservierungen einfach verwaltet werden können.

Entwickeln Sie eine Anwendung, die den Mitarbeitern die tägliche Arbeit erleichtert.

## 1. Stellplätze verwalten

Der Campingplatz verfügt über unterschiedliche Stellplätze.

Für jeden Stellplatz sollen folgende Informationen erfasst werden können:

- Eindeutige Stellplatznummer
- Bezeichnung oder Beschreibung
- Stellplatzart (Zelt, Wohnwagen oder Wohnmobil)
- Maximale Personenanzahl
- Preis pro Nacht

Neue Stellplätze sollen angelegt werden können. Bereits vorhandene Stellplätze sollen bearbeitet und bei Bedarf entfernt werden können.

Eine Stellplatznummer darf nur einmal vergeben werden.

## 2. Stellplatzübersicht

Alle Stellplätze sollen in einer übersichtlichen Liste angezeigt werden.

Dabei sollen mindestens folgende Informationen ersichtlich sein:

- Stellplatznummer
- Stellplatzart
- Maximale Personenanzahl
- Preis pro Nacht

Zu jedem Stellplatz sollen außerdem die vollständigen Informationen angezeigt werden können.

## 3. Reservierungen erfassen

Mitarbeiter sollen für Gäste Reservierungen anlegen können.

Für eine Reservierung werden folgende Informationen benötigt:

- Name des Gastes
- Telefonnummer oder E-Mail-Adresse
- Gewünschter Stellplatz
- Anreisedatum
- Abreisedatum
- Anzahl der anreisenden Personen

Bei einer Reservierung muss überprüft werden, ob der gewünschte Stellplatz im angegebenen Zeitraum verfügbar ist.

Ein Stellplatz darf niemals für zwei Reservierungen mit überschneidenden Aufenthaltszeiträumen gebucht werden.

Das Abreisedatum muss nach dem Anreisedatum liegen. Die maximale Personenanzahl des Stellplatzes darf nicht überschritten werden.

Der Abreisetag gilt nicht als belegte Nacht. Eine neue Reservierung darf daher am Abreisetag einer bestehenden Reservierung beginnen.

## 4. Reservierungsübersicht

Alle Reservierungen sollen übersichtlich dargestellt werden.

Folgende Informationen sollen mindestens angezeigt werden:

- Name des Gastes
- Stellplatznummer
- Anreisedatum
- Abreisedatum
- Anzahl der Personen

Die Reservierungen sollen nach dem Anreisedatum sortiert angezeigt werden.

## 5. Suche und Filterung

Die Mitarbeiter sollen Reservierungen schnell finden können.

Folgende Suchmöglichkeiten werden benötigt:

- Suche nach dem Namen eines Gastes
- Filterung nach Stellplatz
- Anzeige aller Reservierungen, deren Anreise noch bevorsteht

## 6. Reservierungen bearbeiten

Bereits erfasste Reservierungen sollen nachträglich geändert werden können.

Beispielsweise kann ein Gast seinen Aufenthalt verlängern oder auf einen anderen Stellplatz wechseln.

Bei jeder Änderung muss erneut überprüft werden, ob der gewünschte Stellplatz verfügbar ist und die Anzahl der Personen zulässig ist.

Eine Änderung darf keine Doppelbuchung verursachen.

## 7. Reservierungen stornieren

Falls ein Gast seinen Aufenthalt absagt, soll die Reservierung storniert werden können.

Vor der Stornierung soll eine Bestätigung erfolgen.

Stornierte Reservierungen sollen weiterhin in der Reservierungsübersicht erkennbar sein. Sie dürfen den Stellplatz für andere Reservierungen nicht mehr blockieren.

## 8. Berechnung der Aufenthaltskosten

Für jede Reservierung sollen die gesamten Aufenthaltskosten automatisch berechnet und angezeigt werden.

Die Berechnung erfolgt anhand der Anzahl der gebuchten Nächte und des Preises pro Nacht.

Beispiel

Anreise

10\. Juli

Abreise

14\. Juli

Aufenthaltsdauer

4 Nächte

Preis pro Nacht

25,00 €

Gesamtkosten

# 100,00 €

## 9. Allgemeine Anforderungen

Die Anwendung soll folgende Anforderungen erfüllen:

- Übersichtliche und verständliche Bedienung
- Einheitliches Erscheinungsbild
- Gute Nutzbarkeit auf Computern und Smartphones
- Dauerhafte Speicherung aller erfassten Informationen
- Verständliche Rückmeldungen bei erfolgreichen Aktionen
- Überprüfung sämtlicher Benutzereingaben
- Verständliche Fehlermeldungen bei ungültigen Eingaben
- Verhinderung von Doppelbuchungen
- Sinnvolle Behandlung von fehlerhaften oder fehlenden Informationen

Eine Benutzeranmeldung ist nicht erforderlich.

## 10. Abgabe

Geben Sie die vollständige Anwendung sowie alle für die Inbetriebnahme notwendigen Dateien ab.

Falls besondere Schritte zur Einrichtung erforderlich sind, sollen diese kurz dokumentiert werden.

## 11. Bewertung

| Bewertungskriterium                      | Punkte |
| ---------------------------------------- | ------ |
| Stellplätze erfassen und verwalten       | 15     |
| Stellplatzübersicht und Detailanzeige    | 10     |
| Reservierungen erfassen                  | 15     |
| Reservierungsübersicht                   | 10     |
| Suche und Filterung                      | 10     |
| Reservierungen bearbeiten und stornieren | 15     |
| Verhinderung von Doppelbuchungen         | 10     |
| Berechnung der Aufenthaltskosten         | 5      |
| Benutzerfreundlichkeit und Gestaltung    | 5      |
| Eingabeprüfung und Fehlerbehandlung      | 5      |
| Gesamt                                   | 100    |

## 12. Mindestanforderungen für eine positive Beurteilung

Für eine positive Beurteilung müssen mindestens 50 Punkte erreicht werden. Die folgenden Kernfunktionen müssen dabei grundsätzlich funktionieren:

- Stellplätze können erfasst und dauerhaft gespeichert werden.
- Vorhandene Stellplätze werden in einer Übersicht angezeigt.
- Reservierungen können angelegt und angezeigt werden.
- Reservierungen können bearbeitet und storniert werden.
- Überschneidende Reservierungen für denselben Stellplatz werden verhindert.
- Ungültige Aufenthaltszeiträume werden abgewiesen.
- Die Aufenthaltskosten werden korrekt berechnet.
- Die wichtigsten Benutzereingaben werden überprüft.

## 13. Optionale Zusatzaufgaben

Diese Aufgaben sollen erst bearbeitet werden, wenn alle Pflichtanforderungen abgeschlossen sind.

1. Verfügbarkeitsprüfung: Mitarbeiter können einen Zeitraum eingeben und erhalten eine Übersicht aller in diesem Zeitraum verfügbaren Stellplätze.
2. Umsatzübersicht: Anzeige der gesamten Reservierungsumsätze für einen ausgewählten Monat.
3. Belegungsstatistik: Anzeige, wie viele Stellplätze an einem bestimmten Datum belegt sind.
4. Gästehistorie: Anzeige aller bisherigen Reservierungen eines bestimmten Gastes.
5. Druckansicht: Erstellung einer übersichtlichen, druckfreundlichen Reservierungsbestätigung.

## 14. Lösungsskizze – nur für die Prüfungskommission

Dieser Abschnitt ist nicht Bestandteil der Aufgabenstellung für die Prüflinge.

Erwartete fachliche Objekte: Stellplatz und Reservierung. Gästeinformationen können direkt bei Reservierungen gespeichert oder separat verwaltet werden.

Erwartete Funktionen: Stellplatzverwaltung, Reservierungserfassung, Anzeige, Suche, Bearbeitung, Stornierung, Verfügbarkeitsprüfung und Kostenberechnung.

Wichtige Prüffälle:

- Eine Reservierung überschneidet sich mit einer bereits vorhandenen Reservierung.
- Zwei Reservierungen schließen unmittelbar aneinander an.
- Das Abreisedatum liegt vor oder auf dem Anreisedatum.
- Die angegebene Personenanzahl überschreitet die Stellplatzkapazität.
- Eine bestehende Reservierung wird verlängert und überschneidet sich dadurch mit einer anderen.
- Eine stornierte Reservierung blockiert den Stellplatz nicht mehr.
- Ein Stellplatz mit aktiven zukünftigen Reservierungen soll entfernt werden.
- Die Berechnung der Aufenthaltskosten erfolgt korrekt.

Bewertungsspielraum: Die technische Umsetzung, Datenhaltung, Seitenaufteilung und Projektstruktur werden bewusst nicht vorgegeben. Die Prüflinge müssen diese Entscheidungen selbst treffen.

Zeitliche Einschätzung: Die Pflichtanforderungen sind für sechs Stunden konzipiert. Der Schwerpunkt liegt auf der Verwaltung zusammengehöriger Informationen und der korrekten Prüfung von Reservierungszeiträumen. Die Zusatzaufgaben sind nicht Bestandteil des verpflichtenden Umfangs.

## Anwendung starten

1. In XAMPP Apache und MySQL starten.
2. In phpMyAdmin unter „Importieren“ die Datei `database.sql` auswählen. Sie legt die Datenbank `camping` und die beiden Tabellen an.
3. Bei abweichenden MySQL-Zugangsdaten die Konstanten in `Model/DB.php` anpassen. Standardmäßig wird der lokale XAMPP-Zugang `root` mit leerem Passwort verwendet.
4. `http://localhost/LAPUebung/public/` öffnen.

Die Anwendung benötigt PHP mit `pdo_mysql` und `mbstring`. Die Einstiegsseiten liegen in `public/`, die Seitenlogik in `Controller/`, die Eingabeprüfung in `Requests/`, der Datenbankzugriff in `Model/` und die HTML-Ansichten in `src/views/`.

Der Preis pro Nacht wird bei der Buchung gespeichert. Bei einem Stellplatzwechsel gilt der Preis des neuen Stellplatzes. Entfernte Stellplätze bleiben mit früheren und stornierten Reservierungen verknüpft.
